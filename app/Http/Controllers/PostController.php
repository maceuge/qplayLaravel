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

    public function deletePost ($id) {
        $post = Post::find($id);
        $post->delete();
        return redirect('/userlog');
    }

    public function delcoment ($id) {
        $coment = Coment::find($id);
        $coment->delete();
        return redirect('/userlog');
    }

    public function updateWithEditedPost(Request $request, $id){
        Post::where("id", $id)->update(array("post" => $request['post']));
        return redirect('/userlog');
    }

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

}

