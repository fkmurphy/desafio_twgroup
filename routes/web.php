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

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('publications','PublicationController');
Route::get('/publications/comment/{id}','PublicationController@comment');
Route::get('/comments/create/{id}','CommentController@create')->name('comments.create');
Route::post('/comments/{id}','CommentController@store')->name('comments.store');