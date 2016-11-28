<?php

namespace App\Http\Controllers;

use App\Friend;
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



}
