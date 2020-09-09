<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
//
//Route::apiResource('posts', 'Api\PostController');
//
//Route::get('/user/posts', 'Api\PostController@userPosts');

Route::get('/posts', 'Api\PostController@index');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('posts', 'Api\PostController@store');

    Route::get('/user/posts', 'Api\PostController@userPosts');
});
