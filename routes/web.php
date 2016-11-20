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
Route::get('/userlog', function () { return view('/user/show'); });






