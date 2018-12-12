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
   Route::get('/','AdminController@index')->name('admin.dashboard');
   //Posters
   Route::get('/posters','Admin\PosterController@getPosters')->name('posters.all');
   Route::get('/posters/approved','Admin\PosterController@getApprovedPosters')->name('posters.approved');
   Route::get('/posters/waiting','Admin\PosterController@getWaitingPosters')->name('posters.waiting');
   Route::post('/poster/approve/{id}','Admin\PosterController@approve')->name('poster.approve');
   Route::post('/poster/refuse/{id}','Admin\PosterController@refuse')->name('poster.refuse');
   Route::post('/poster/delete/{id}','Admin\PosterController@delete')->name('poster.delete');
   Route::get('/posters/{id}','Admin\PosterController@getSinglePoster')->name('admin_single_poster');
   //Definitions
   Route::get('/definitions','Admin\DefinitionController@getDefinitions')->name('definitions.all');
   Route::get('/definitions/waiting','Admin\DefinitionController@getWaitingDefinitions')->name('definitions.waiting');
   Route::post('/definition/approve/{id}','Admin\DefinitionController@approve')->name('definition.approve');
   Route::post('/definition/refuse/{id}','Admin\DefinitionController@refuse')->name('definition.refuse');
   Route::post('/definition/delete/{id}','Admin\DefinitionController@delete')->name('definition.delete');
   Route::get('/definition/{id}','Admin\DefinitionController@getSingleDefinition')->name('admin_single_definition');
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