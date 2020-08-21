<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index');
Route::get('/posts', 'HomeController@posts');
Route::get('/post/{id}/view','HomeController@postView');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/adminHome','AdminController@index');
Route::get('/adminHome/posts','PostController@index');
Route::get('/adminHome/post/new','PostController@create');
Route::post('/adminHome/post/SavePost','PostController@store');
Route::get('/adminHome/post/{id}/delete','PostController@destroy');
Route::get('/adminHome/post/{id}/edit','PostController@edit');
Route::post('/adminHome/post/{id}/update','PostController@update');
