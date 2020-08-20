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
Route::get('/adminHome/posts','AdminController@posts');
Route::get('/adminHome/post/new','AdminController@newPost');
