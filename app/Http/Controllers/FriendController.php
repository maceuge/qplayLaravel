<?php

namespace App\Http\Controllers;

use App\Friend;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    public function addfriend ($id) {
        $friend = User::find($id);
        $user = Auth::user();

        $friendslist = Friend::create([
            'user_id' => $user->id,
            'friend_id' => $friend->id,
        ]);

        $friendslist->save();
        return redirect('/userlog');
    }

    public function delfriend ($id) {
        $friend = Friend::where('friend_id', $id)->delete();
        return redirect('/busfrends');
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



}
