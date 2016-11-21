<?php

namespace App\Http\Controllers;

use App\Post;
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
        $post = Post::orderBy('post', 'desc')->get();
        return view('/user/show', [
            'posts' => $post,
        ]);
    }

    public function editPost ($id) {
        $postline = Post::find($id);

        return view('/user/show', [
            'postline' => $postline,
        ]);

    }

    public function deletePost ($id) {
        $post = Post::find($id);
        $post->delete();
        return redirect('/userlog');
    }


}
