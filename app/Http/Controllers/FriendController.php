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
        return redirect('/userlog');
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
        $query = User::where(
            'name',
            'LIKE',
            '%' .$request->input('query'). '%'
        )->get();

        $user = Auth::user();
        $buscfriends = User::all()->sortBy('id');
        $friendlist = [];
        $isFriend = [];
        $indexFriends = 0;

        $userfriends = $user->friend;
        foreach ($userfriends as $friend) {
            array_push($friendlist, $friend->friend_id);
        }
        $friends = User::whereIn('id', $friendlist)->orderBy('id')->get();

        for($i = 0; $i < count($buscfriends); $i++){
            if($buscfriends[$i]->id == $friends[$indexFriends]->id){
                $isFriend[$buscfriends[$i]->id] = true ;
                if($indexFriends < count($friends) -1 ){
                    $indexFriends++;
                }
            } else {
                $isFriend[$buscfriends[$i]->id] = false ;
            }
        }

        return view('/user/searchfriends', [
            'user' => $user,
            'buscfrends' => $buscfriends,
            'userfriends' => $friends,
            'isFriend' => $isFriend,
            'querys' => $query,
        ]);


    }


}
