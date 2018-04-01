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

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {


    return view('welcome');
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/news', ['as'=>'home.news','uses'=>'AdminPostsController@news']);

Route::get('/news/{id}', ['as'=>'home.post','uses'=>'AdminPostsController@post']);

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');



Route::get('/create', 'AdminPostsController@createnews');
Route::post('/create', 'AdminPostsController@savenews');

//Route::resource('/posts','HomeNewsController');





Route::group(['middleware' => 'IsAdmin','IsAuthor'], function() {
    Route::resource('users', 'AdminUsersController');
    Route::resource('posts', 'AdminPostsController');
    Route::resource('categories', 'AdminCategoriesController');
    Route::resource('comments', 'AdminCommentsController');
    Route::resource('roles', 'AdminRolesController');
});



Route::get('/contact',function (){
   return view('contact');
});

Route::get('/about',function (){
    return view('about');
});











