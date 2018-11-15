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

Route::get('/', 'PosterController@index');


Route::post('/store_user','AuthController@register')->name('register_user');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'admin'],function (){
   Route::get('/','AdminController@index');
});

Route::group(['prefix' => 'poster'],function (){
   Route::get('/create','PosterController@create')->name('create.poster');
   Route::post('/create','PosterController@store')->name('store.poster');
   Route::get('/create_video','PosterController@videoCreate')->name('video_create');
   Route::get('/{slug}/{id}','PosterController@single')->name('single.poster');

});

Route::post('/comment','CommentController@store')->name('add_comment');
Route::post('/poster/upvote','PosterController@upvote')->name('upvote_poster');
Route::post('/poster/downvote','PosterController@downvote')->name('downvote_poster');

Route::group(['prefix' => 'user'],function (){
   Route::get('/settings','UserController@settings')->name('user.settings');
   Route::get('/{slug}','UserController@profile')->name('user.profile');
});
