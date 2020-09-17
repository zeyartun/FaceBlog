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
Route::post('/message/send', 'HomeController@message');

Route::get('/posts', 'HomeController@posts');
Route::get('/post/{id}/view','HomeController@postView');
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/{postID}/comment','CommentController@create');

Route::group(['prefix'=>'adminHome','middleware'=>['isAuth','verified']],function(){
    Route::get('/','AdminController@index');
    Route::get('/posts','PostController@index');
    Route::get('/post/new','PostController@create');
    Route::post('/post/SavePost','PostController@store');
    Route::get('/post/{id}/view','PostController@show');

    Route::group(['middleware' => ['isAuthor']], function () {
        
        Route::get('/post/{id}/hide','PostController@hide');
        Route::get('/post/{id}/delete','PostController@destroy');
        Route::get('/post/{id}/restore','PostController@restore');
        
        Route::get('/post/{id}/edit','PostController@edit');
        Route::post('/post/{id}/update','PostController@update');
    });
    
    Route::group(['middleware'=>'isManager'], function () {
        
        Route::get('/members','UserController@show');
        Route::get('/roles','RoleController@index');

        Route::group(['prefix' => 'category'], function () {
            
            Route::get('/','CategoryController@index');
            Route::get('/new','CategoryController@create');
            Route::get('/edit','CategoryController@edit');
            Route::get('/{id}/delete','CategoryController@destroy');

        });

        Route::group(['prefix' => 'messages'], function () {
        
            Route::get('/','MessageController@index');
            Route::get('/{id}/hide','MessageController@hide');
            Route::get('/{id}/store','MessageController@store');
            Route::get('/{id}/delete','MessageController@delete');
            Route::get('/trash','MessageController@trash');
        });

        Route::group(['prefix' => 'comment'], function () {
            Route::get('/','CommentController@index');
            Route::get('/{id}/hide','CommentController@hide');
            Route::get('/{id}/store','CommentController@store');
            Route::get('/{id}/delete','CommentController@delete');
            Route::get('/trash','CommentController@trash');
        });    


    });

    Route::group(['middleware'=>'isAdmin'], function () {
        Route::get('/member/{id}/edit','UserController@edit');
        Route::post('/member/{id}/update','UserController@update');
    });
    
    
});


