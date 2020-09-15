<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Auth;
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
Route::post('/{postID}/comment','CommentController@create');

Route::group(['prefix'=>'adminHome','middleware'=>'admin'],function(){
    Route::get('/','AdminController@index');
    Route::get('/posts','PostController@index');
    Route::get('/post/new','PostController@create');
    Route::post('/post/SavePost','PostController@store');
    Route::get('/post/{id}/view','PostController@show');

    Route::get('/post/{id}/hide','PostController@hide');
    Route::get('/post/{id}/delete','PostController@destroy');
    Route::get('/post/{id}/restore','PostController@restore');

    Route::get('/post/{id}/edit','PostController@edit');
    Route::post('/post/{id}/update','PostController@update');

    Route::get('/members','UserController@show');
    Route::get('/roles','RoleController@index');

    Route::group(['middleware'=>'admin_role'], function () {
        Route::get('/member/{id}/edit','UserController@edit');
        Route::post('/member/{id}/update','UserController@update');
    });
    
    
});


