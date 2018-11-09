<?php
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

Route::group(['prefix' => 'v1', 'namespace' => 'v1'], function () {


    //登录
    Route::post('/login', 'LoginController@login');
    //注册
    Route::post('/register', 'RegisterController@register');

    Route::group(['middleware' => ['apiMiddleware']], function () {

    });
});

