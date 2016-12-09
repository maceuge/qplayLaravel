<?php

namespace App\Http\Controllers;

use App\Friend;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    public function addfriend (Request $request, $id) {
        $friend = User::find($id);
        $user = Auth::user();

        $friendslist = Friend::create([
            'user_id' => $user->id,
            'friend_id' => $friend->id,
        ]);

        $friendslist->save();

        $message = 'Empece a seguir a '.$friend->name.' '.$friend->surname;

        if ($request->ajax()) {
            return $message;
        }
    }

    public function delfriend (Request $request, $id) {
        $userToDelete = User::find($id);

        //dd($userToDelete);
        Friend::where('friend_id', $id)
                ->where('user_id', \Auth::user()->id)
                ->delete();

        $message = 'Deje de seguir a '.$userToDelete->name.' '.$userToDelete->surname;


        if ($request->ajax()) {
            return $message;
        }

    }

    public function friendperfil ($id) {
        $userLog = Auth::user();
        $friend = User::find($id);
        $posts = Post::orderBy('created_at', 'desc')->where('user_id', $friend->id)->get();

        return view('/user/friend', [
            'user' => $userLog,
            'friend' => $friend,
            'posts' => $posts,
        ]);
    }

    public function friendsearch (Request $request) {

        $resultado = User::where('name','LIKE', '%'.$request->input('query').'%')
                ->orwhere('surname','LIKE', '%'.$request->input('query').'%')
                ->get();

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

        return view('user.searchfriends', [
            'user' => $userLoggedIn,
            'users' => $users,
            'isFriend' => $isFriend,
            'resultado' => $resultado
        ]);
    }
}
