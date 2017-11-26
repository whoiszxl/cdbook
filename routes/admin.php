<?php


//admin后台
Route::group(['prefix' => 'admin'], function(){
    
    //admin登录界面
    Route::get('/login', '\App\Admin\Controllers\LoginController@index');

    //admin登录行为
    Route::post('/login', '\App\Admin\Controllers\LoginController@login');
    
    //admin登出行为
    Route::get('/logout', '\App\Admin\Controllers\LoginController@logout');


    //后台权限验证
    Route::group(['middleware' => 'auth:admin'], function(){

        //首页
        Route::get('/home', '\App\Admin\Controllers\HomeController@index');

        //管理人员模块
        Route::get('/users', '\App\Admin\Controllers\UserController@index');
        Route::get('/users/create', '\App\Admin\Controllers\UserController@create');
        Route::post('/users/store', '\App\Admin\Controllers\UserController@store');

    });

    
});