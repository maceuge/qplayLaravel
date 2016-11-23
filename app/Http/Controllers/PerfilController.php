<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function avatarUpload (Request $request)
    {
        $user = Auth::user();

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = str_slug($user->name) . '-' . $user->id . '.' . $file->extension();
            $filestorage = $file->storeAs('avatar', $filename, env('PUBLIC_STORAGE', 'public'));
            $user->avatar = $filestorage;
            $user->save();
        }

        return redirect('/userlog');

    }
}
