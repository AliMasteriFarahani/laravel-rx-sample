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

use App\Country;
use App\Post;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/posts', 'PostsController@index');
// Route::post('/posts', 'PostsController@create');
// Route::delete('/posts', 'PostsController@delete');
// Route::patch('/posts', 'PostsController@update');

// Route::get('/posts/{id?}','PostsController@index'); 

Route::resource('/posts', 'PostsController');

Route::get('/my-view/{id}/{name}', 'PostsController@showMyView');

Route::get('/contacts', 'PostsController@contact');


//---------------------------------------
// database raw commands : 
//---------------------------------------

// Route::get('/insert','PostsController@insert');
// Route::get('/select','PostsController@select');
// Route::get('/update','PostsController@updatePost');
// Route::get('/delete','PostsController@deletePost');


//-----------------------------------------
// Eloquent : 
//-----------------------------------------

Route::get('/get-posts', 'PostsController@getAllPosts');
Route::get('/save-post', 'PostsController@savePost');
Route::get('/update-post', 'PostsController@updatePost');
Route::get('/delete-post', 'PostsController@deletePost');

// soft delete :

Route::get('/data-trash', 'PostsController@workWithTrash');
Route::get('/restore-post', 'PostsController@restorePost');
Route::get('/force-delete-post', 'PostsController@forceDelete');


//------------------------------------------------------------
// Eloquent Relationship : 
//------------------------------------------------------------

//-----------------------------------------
// Eloquent One to One : 
//-----------------------------------------

// Route::get('user/{id}/post', function ($id) {
//     // return User::find($id)->post;
//     return User::find($id)->post->title;
// });

// Eloquent One to One ( reverse ) : 
//-----------------------------------
// Route::get('post/{id}/user', function ($id) {
//     $post_user = Post::find($id)->user;
//     return $post_user;
// });


//-----------------------------------------
// Eloquent One to Many : 
//-----------------------------------------

Route::get('user/{id}/posts', function ($id) {
    $post_user = User::find($id)->posts;
    return $post_user;
});

// Eloquent One to Many ( reverse ) : 
//-----------------------------------------

Route::get('post/{id}/user',function(){
    $post = Post::find(5);
    return $post->user;
});


//-----------------------------------------
// Eloquent Many to Many : 
//-----------------------------------------

Route::get('user/{id}/roles',function($id){
    $user = User::find($id);
    return $user->roles;
});


// Eloquent Many to Many ( reverse ): 
//-----------------------------------------

Route::get('role/{id}/users',function($id){
    $role = Role::find($id);
    return $role->users;
});



//-----------------------------------------
// Eloquent has many through : 
//-----------------------------------------

Route::get('user/{id}/country',function($id){
    $country = Country::find($id);
    return $country;
});