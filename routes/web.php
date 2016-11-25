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
Route::get('/home', 'HomeController@index');

// Pagina Principal
Route::get('/', function () { return view('/home/index'); });
// Pagina FAQs
Route::get('/faqs', function () { return view('/home/faqs'); });
// Pagina de Usuario Logueado
//Route::get('/userlog', function () { return view('/user/show'); });
Route::get('/userlog', 'PostController@orderpost');
// Ruta para hacer el post
Route::post('/posting', 'PostController@posting');
// rutas para editar y borrar
Route::get('/edit/{id}', 'PostController@editPost');
Route::get('/delete/{id}', 'PostController@deletePost');
Route::post('/edition/{id}', 'PostController@updateWithEditedPost');

// Subir Avatar
Route::post('/avatarUpload', 'PerfilController@avatarUpload');







