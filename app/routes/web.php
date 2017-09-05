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


Auth::routes();
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');

Route::post('/complete', 'UserController@updateSocialComplete')->middleware('auth')->name('complete');
Route::get('/complete', 'UserController@complete')->middleware('auth');


Auth::routes();


Route::get('/', 'IndexController@newest');
Route::post('/', 'IndexController@search');

Route::get('/playlist/create', 'PlaylistController@create')->middleware('auth');
Route::post('/playlist/create', 'PlaylistController@store')->middleware('auth');
Route::get('/playlist/create/{id}', 'PlaylistController@createList')->middleware('auth')->where('id', '[0-9]+');
Route::post('/playlist/create/{id}', 'PlaylistController@storeList')->middleware('auth')->where('id', '[0-9]+');
Route::get('/like/{id}', 'LikeController@addLike')->middleware('auth')->where('id', '[0-9]+');
Route::get('/share/{id}', 'ShareController@addShare')->middleware('auth')->where('id', '[0-9]+');
Route::get('/rate/{id}', 'RateController@getRate')->where('id', '[0-9]+');
Route::post('/rate/set/{id}', 'RateController@SetRate')->where('id', '[0-9]+');
Route::get('/list/delete/{id}', 'PlaylistController@DeleteList')->middleware('auth')->where('id', '[0-9]+');
Route::get('/playlist/delete/{id}', 'PlaylistController@DeletePlay')->middleware('auth')->where('id', '[0-9]+');


Route::get('/user/{name}', 'UserController@show');
Route::get('/profile/edit', 'UserController@edit')->middleware('auth');
Route::post('/profile/edit', 'UserController@update')->middleware('auth');
Route::get('/playlist/show/{id}', 'PlaylistController@ShowPlay')->where('id', '[0-9]+');
