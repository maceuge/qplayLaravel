<?php

namespace App\Http\Controllers;

use App\Friend;
use App\User;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function avatarUpload (Request $request)
    {
        $user = Auth::user();
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = str_slug($user->name) . '-' . $user->id . '.' . $file->extension();
            $filestorage = $file->storeAs('/avatar', $filename, env('PUBLIC_STORAGE', 'public'));
            $user->avatar = $filestorage;
            $user->save();
        }
        return redirect('/userlog');
    }

    public function wallview () {
        $user = Auth::user();
        $friendlist = [];
        $postlist = [];

        $userfriends = $user->friend;
        foreach ($userfriends as $friend) {
            array_push($friendlist, $friend->friend_id);
        }
        $friends = User::whereIn('id', $friendlist)->get();

        for ($i = 0; $i < count($friends) ;$i++) {
            foreach ($friends[$i]->post as $post) {
                array_push($postlist, $post->id);
            }
        }
        $post = Post::whereIn('id', $postlist)->orderBy('created_at', 'desc')->get();

        return view('/user/show', [
            'user' => $user,
            'post' => $post,
            'friends' => $friends,
        ]);
    }

    public function searchfriends () {
        $userLoggedIn = Auth::user();
        $users = User::all()->sortBy('id');
        $friendList = [];

        if (count($userLoggedIn->friend)>0) {
            foreach ($userLoggedIn->friend as $friend) {
                array_push($friendList, $friend->friend_id);
            }
            $myFriends = User::whereIn('id', $friendList)->orderBy('id')->get();
        } else {
            $myFriends = null;
        }

        $isFriend = [];
        $indexFriend = 0;
        $indexUser = 0;


        while($indexUser < count($users)) {

            while($indexFriend < count($myFriends) && $users[$indexUser] != $myFriends[$indexFriend]) {
                $indexFriend ++;
            }

            if ($indexFriend == count($myFriends)) {
                $isFriend[$users[$indexUser]->id] = false;
            } else {
                $isFriend[$users[$indexUser]->id] = true;
            }
            $indexFriend = 0;
            $indexUser ++;
        }

        return view('/user/searchfriends', [
            'user' => $userLoggedIn,
            'users' => $users,
            'isFriend' => $isFriend
        ]);
    }

}
