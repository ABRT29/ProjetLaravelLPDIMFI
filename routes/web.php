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

Route::resource('users', 'UserController', ['only' => ['index', 'edit', 'update', 'destroy', 'create', 'store']])->middleware('admin');
Route::get('users/{user}/delete', 'UserController@destroyForm')->name('users.delete')->middleware('admin');


Route::get('/', 'HomeController@index')->name('index');
Route::get('/home', 'PostsController@me')->name('home');

Route::get('/administration', 'UserController@index')->name('admin.index')->middleware('admin');

Route::get('/post/add', 'PostsController@create')->name('post.add');
Route::post('/createPost', 'PostsController@createPost')->name('createPost');

Route::get('/delete/{id}', 'PostsController@delete')->name('post.delete');

Route::get('/edit/{id}', 'PostsController@edit')->name('post.edit');
Route::post('/editPost/{id}', 'PostsController@editPost')->name('editPost');

