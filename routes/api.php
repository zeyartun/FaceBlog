<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/post','ApiPostController@index');
// Route::post('/post/store','ApiPostController@store');
// Route::get('/post/{id}/show','ApiPostController@show');
// Route::put('/post/{id}/update','ApiPostController@update');
// Route::delete('/post/{id}/delete','ApiPostController@destroy');


Route::resource('post', 'ApiPostController');

Route::get('/comments','ApiCommentController@index');