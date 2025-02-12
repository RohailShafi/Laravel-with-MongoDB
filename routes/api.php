<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');


//dd('api.php');

Route::post('create-post', 'App\Http\Controllers\PostController@createP');
Route::post('update-post', 'App\Http\Controllers\PostController@updateP');
Route::delete('delete-post', 'App\Http\Controllers\PostController@destroy');
Route::get('post', 'App\Http\Controllers\PostController@post');
Route::get('posts', 'App\Http\Controllers\PostController@posts');
