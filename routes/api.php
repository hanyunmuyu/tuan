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

    //高校列表
    Route::get('/school', 'SchoolController@list');
    Route::post('/school/post', 'SchoolController@post');
    Route::get('/community', 'CommunityController@list');
    //社团详情
    Route::get('/community/detail', 'CommunityController@detail');


    Route::get('/communityActive/list', 'CommunityActiveController@list');


    Route::group(['middleware' => ['apiMiddleware']], function () {
        //关注社团
        Route::post('/community/attention', 'CommunityController@attention');
        //加入社团
        Route::post('/community/join', 'CommunityController@join');
    });
});

