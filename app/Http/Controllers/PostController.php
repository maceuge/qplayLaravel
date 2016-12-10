<?php

namespace App\Http\Controllers;

use App\Coment;
use App\Friend;
use App\Post;
use App\User;
use Illuminate\Routing\Redirector;
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

    public function deletePost (Request $request) {
        $post = Post::find($request['postId']);
        $post->delete();

        return response()->json(['mensaje' => $request['postId']], 200);
    }

    public function delcoment ($id) {
        $coment = Coment::find($id);
        $coment->delete();
        return redirect('/userlog');
    }

    public function addcoment (Request $request, $post_id) {

        $user = Auth::user();
        $coment = Coment::create([
            'post_id' => $post_id,
            'user_id' => $user->id,
            'coment' => $request['comment'],
        ]);

        $coment->save();

        //return redirect('/userlog');

        return response()
                ->json([
                    'comment'   => $request['comment'],
                    'postId'    =>  $post_id,

                ]);
    }

    public function addcomentfriend (Request $request, $post_id, $frd_id) {
        $user = Auth::user();
        $coment = Coment::create([
            'post_id' => $post_id,
            'user_id' => $user->id,
            'coment' => $request['coment'],
        ]);
        $coment->save();

        return redirect()->action(
            'FriendController@friendperfil', ['id' => $frd_id]
        );
    }

    public function updatepost (Request $request) {
        $post = Post::find($request['postId']);
        $post->post = $request['body'];
        $post->update();

        return response()->json(['new_body' => $post->post], 200);
    }

}

