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


Route::group(['prefix' => 'user'],function (){
    Route::get('/settings','UserController@settings')->name('user.settings');
    Route::get('/{slug}','UserController@profile')->name('user.profile');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'],function (){
   Route::get('/','AdminController@index');
});

Route::group(['prefix' => 'poster'],function (){
   Route::get('/trending','PosterController@trending')->name('poster.trending');
   Route::get('/fresh','PosterController@fresh')->name('poster.fresh');
   Route::get('/create','PosterController@create')->name('create.poster');
   Route::post('/create','PosterController@store')->name('store.poster');
   Route::get('/create_video','PosterController@videoCreate')->name('video_create');
   Route::get('/{slug}/{id}','PosterController@single')->name('single.poster');

});

Route::group(['prefix' => 'definicije'],function (){
   Route::get('/create','DefinitionController@create')->name('create.definition');
   Route::post('/create','DefinitionController@store')->name('store.definition');
   Route::get('/','DefinitionController@index')->name('index.definition');
   Route::get('/trending','DefinitionController@trending')->name('trending.definition');
   Route::get('/fresh','DefinitionController@fresh')->name('fresh.definition');
   Route::get('/{slug}/{id}','DefinitionController@single')->name('single.definition');
});

Route::post('/comment','CommentController@store')->name('add_comment');
Route::post('/poster/upvote','PosterController@upvote')->name('upvote_poster');
Route::post('/poster/downvote','PosterController@downvote')->name('downvote_poster');

Route::get('/autori','AutorsController@index')->name('autori.index');
Route::post('/coverPhoto','AutorsController@coverImg')->name('change.cover');
Route::post('/profilePhoto','AutorsController@profileImg')->name('change.profile');