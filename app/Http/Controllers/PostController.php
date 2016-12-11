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
            'post' => $request['body'],
        ]);

        //$post->save();

        //return redirect('/userlog');


        if ($user->avatar) {
            $avatar = '/'.$user->avatar;
        } else {
            if ($user->gender == 'Hombre') {
                $avatar = '/default_male.jpg';
            } elseif ($user->gender == 'Mujer') {
                $avatar = '/default_female.jpg';
            } else {
                $avatar = '/default_other.jpg';
            }
        }

        $date = date_create($post->created_at);
        $fecha_post = date_format($date, 'Y-m-d H:i:s');


        return response()->json(['post_body'      => $request['body'],
                                'postId'        => $post->id,
                                'fecha_post'    => $fecha_post,
                                'user_avatar'   => $avatar,
                                'user_name'     => $user->name,
                                'user_surname'  => $user->surname

                                ]);
    }

    public function deletePost (Request $request) {
        $post = Post::find($request['postId']);
        //$post->delete();

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

}

