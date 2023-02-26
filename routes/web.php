<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/posts', 'PostsController@index');
// Route::post('/posts', 'PostsController@create');
// Route::delete('/posts', 'PostsController@delete');
// Route::patch('/posts', 'PostsController@update');

// Route::get('/posts/{id?}','PostsController@index'); 

Route::resource('/posts','PostsController');

Route::get('/my-view/{id}/{name}','PostsController@showMyView');

Route::get('/contacts','PostsController@contact');
