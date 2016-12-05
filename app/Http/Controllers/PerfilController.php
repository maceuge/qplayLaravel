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
            $filestorage = $file->storeAs('avatar', $filename, env('PUBLIC_STORAGE', 'public'));
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
        //dd($friendlist);
        return view('/user/show', [
            'user' => $user,
            'post' => $post,
            'friends' => $friends,
        ]);
    }

    public function busfrends () {
        $user = Auth::user();
        $buscfrends = User::all();
       // $friend = Friend::all();
        $friendlist = [];

        //dd($friend->id);

        $userfriends = $user->friend;
        foreach ($userfriends as $friend) {
            array_push($friendlist, $friend->friend_id);
        }
        $friends = User::whereIn('id', $friendlist)->get();

        return view('/user/busfrends', [
            'user' => $user,
            'buscfrends' => $buscfrends,
            'userfriends' => $friends,
        ]);
    }

}
