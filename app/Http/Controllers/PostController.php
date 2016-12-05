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

    public function editPost ($id) {
        $user = Auth::user();
        $postline = Post::find($id);
        $post = Post::orderBy('created_at', 'desc')->where('user_id', $user->id)->get();
        return view('/user/show', [
            'postline' => $postline,
            'posted' => $post,
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
