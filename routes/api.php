<?php

use Illuminate\Http\Request;

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
Route::get('kos/{limit}/{offset}', 'KosController@index');
Route::post('kos/search', 'KosController@find');
Route::get('/kos/{id}', 'KosController@detail');
Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');
