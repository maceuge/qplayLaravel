<?php

namespace App\Http\Controllers;

use App\Coment;
use App\Friend;
use App\Like;
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

//    public function updateWithEditedPost(Request $request, $id){
//        Post::where("id", $id)->update(array("post" => $request['post']));
//        return redirect('/userlog');
//    }

    public function addcoment (Request $request, $post_id) {
        $user = Auth::user();
        $coment = Coment::create([
            'post_id' => $post_id,
            'user_id' => $user->id,
            'coment' => $request['coment'],
        ]);

        $coment->save();
        return redirect('/userlog');
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
//        return response()->json(['mensaje' => 'post editado'], 200);
    }

    public function isLikePost (Request $request) {

        $user = Auth::user(); // llamo al usuario logueado
        $post_id = $request['postId']; // obtengo el num de postId
        $is_like = $request['isLike']; // obtengo el valor bool del like
        $post = Post::find($post_id); // busco mi post
        $update = false; // creo el estado de update falso

        if ($is_like === 'true') { // depend del estado del is_like vale 1 o 0
            $is_like = 1;
        } else {
            $is_like = 0;
        }

        // esto devuelve null o objeto si el usuario ya puso el like
        $like = $user->like->where('post_id', $post_id)->first();

        if ($like) {
            $already_like = $like->islike;
            $update = true;
            if ($already_like == $is_like) {
                $like->delete();
                return null;
            }
        } else {
            $like = new Like();
        }

        $like->user_id = $user->id;
        $like->post_id = $post->id;
        $like->islike = $is_like;

        if ($update) {
            $like->update();
        } else {
            $like->save();
        }

        return response()->json([
            'islike' => $like,
        ], 200);

//        return null;
    }
}

