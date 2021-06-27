<?php

use Illuminate\Support\Facades\Route;


Route::namespace('Api')->group(function () {
    Route::post('/register','apiController@register');
    Route::post('/login','apiController@login');
});

Route::namespace('Api')->middleware('auth:sanctum')->group(function () {
    Route::get('/profile','apiController@profile');
});
