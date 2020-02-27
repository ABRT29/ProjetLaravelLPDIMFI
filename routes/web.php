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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'PostsController@me')->name('home');

Route::get('/administration', 'AdminController@index')->name('admin.index');

Route::get('/post/add', 'PostsController@create')->name('post.add');
Route::post('/createPost', 'PostsController@createPost')->name('createPost');

Route::get('/delete/{id}', 'PostsController@delete')->name('post.delete');



