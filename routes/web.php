<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Rutas de Logueo y Registro

Auth::routes();


//Route::get('/', 'HomeController@index');

// Pagina Principal
Route::get('/', function () {
    if (! \Illuminate\Support\Facades\Auth::check()){
        return view('/home/index');
    } else{
        return redirect('/userlog');
    }
});
// Pagina FAQs
Route::get('/faqs', function () { return view('/home/faqs'); });

// Proteccion del middleware si no estas logueado
Route::group(['middleware' => ['auth']], function () {

// Pagina de Usuario Logueado
Route::get('/userlog', 'PerfilController@wallview');
// Ruta para hacer el post
Route::post('/posting', 'PostController@posting');
// Ruta para borrar por ajax
Route::delete('/delete', 'PostController@deletePost')->name('delete');
// Ruta para borrar Laravel
//Route::get('/delete/{id}', 'PostController@deletePost');
// Ruta para editar post por ajax
Route::post('/edition', 'PostController@updatepost')->name('edition');
// Ruta para editar post por laravel (ejemplo)
//Route::post('/edition/{id}', 'PostController@updateWithEditedPost');

Route::get('/delcoment/{id}', 'PostController@delcoment');
// Subir Avatar
Route::post('/avatarUpload', 'PerfilController@avatarUpload');
// Buscar Amigos
Route::get('user/searchfriends', ['as' => 'searchfriends', 'uses' => 'PerfilController@searchfriends']);
// Buscar amigos en el buscador
Route::post('/friendsearch', 'FriendController@friendsearch');

// Agregar Amigos
Route::get('/addfriend/{id}', 'FriendController@addfriend');
// Eliminar Amigo
Route::get('/delfriend/{id}', 'FriendController@delfriend');
// Perfil de Amigo
Route::get('friend/{id}', 'FriendController@friendperfil');

// Agregar Comentarios
Route::post('/addcoment/{post_id}','PostController@addcoment');
// Agregar Comentarios en la vista del perfil de amigo
Route::post('/addcomentfriend/{post_id}/frd/{frd_id}','PostController@addcomentfriend');

}); // fin del middleware auth


// ruta temporanea del tipo prueba de edicion
//Route::post('/edition', function (\Illuminate\Http\Request $request) {
//    return response()->json(['mensaje' => $request['postId']]);
//})->name('edition');
