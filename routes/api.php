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

Route::post('login', 'App\Http\Controllers\AuthController@login');
Route::post('register', 'App\Http\Controllers\AuthController@register');

Route::group(['middleware' => 'auth.jwt'], function () {
    Route::get('logout', 'App\Http\Controllers\AuthController@logout');
    Route::get('Question', 'App\Http\Controllers\QuestionController@index');
    Route::put('user/{id}', 'App\Http\Controllers\AuthController@Edit');
});
