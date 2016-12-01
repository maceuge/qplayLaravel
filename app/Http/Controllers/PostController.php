<?php

namespace App\Http\Controllers;

use App\Friend;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function posting (Request $request) {
        $user = Auth::user();
        $post = Post::create([
            'user_id' => $user->id,
            'post' => $request['post'],
        ]);

        $post->save();
        return redirect('/userlog');
    }

    public function orderpost () {
        $user = Auth::user();
        $post = Post::orderBy('created_at', 'desc')->where('user_id', $user->id)->get();

        $friendlist = [];
        $userfriends = $user->friend;
        foreach ($userfriends as $friend) {
            array_push($friendlist, $friend->friend_id);
        }
        $friends = User::whereIn('id', $friendlist)->get();
        //dd($friends[0]->name);
        return view('/user/show', [
            'posted' => $post,
            'friends' => $friends,
        ]);
    }

    public function deletePost ($id) {
        $post = Post::find($id);
        $post->delete();
        return redirect('/userlog');
    }

    public function updateWithEditedPost(Request $request, $id){
        Post::where("id", $id)->update(array("post" => $request['post']));
        return redirect('/userlog');
    }

}
