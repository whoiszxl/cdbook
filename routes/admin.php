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


        Route::group(['middleware' => 'can:system'], function(){
            //管理人员模块
            Route::get('/users', '\App\Admin\Controllers\UserController@index');
            Route::get('/users/create', '\App\Admin\Controllers\UserController@create');
            Route::post('/users/store', '\App\Admin\Controllers\UserController@store');
            Route::get('/users/role/{user}', '\App\Admin\Controllers\UserController@role');
            Route::post('/users/role/{user}', '\App\Admin\Controllers\UserController@storeRole');

            // 角色管理
            Route::get('/roles', '\App\Admin\Controllers\RoleController@index');
            Route::get('/roles/create', '\App\Admin\Controllers\RoleController@create');
            Route::post('/roles/store', '\App\Admin\Controllers\RoleController@storeRole');
            Route::get('/roles/permission/{role}', '\App\Admin\Controllers\RoleController@permission');
            Route::post('/roles/permission/{role}', '\App\Admin\Controllers\RoleController@storePermission');

            // 权限管理
            Route::get('/permissions', '\App\Admin\Controllers\PermissionController@index');
            Route::get('/permissions/create', '\App\Admin\Controllers\PermissionController@create');
            Route::post('/permissions/store', '\App\Admin\Controllers\PermissionController@store');
        }); 


        Route::group(['middleware' => 'can:article'], function(){
            //审核模块
            Route::get('/article', '\App\Admin\Controllers\ArticleController@index');
            Route::post('/article/status/{article}', '\App\Admin\Controllers\ArticleController@status');
        });

        Route::group(['middleware' => 'can:topic'], function(){
            //专题
            Route::resource('topics', '\App\Admin\Controllers\TopicController',['only'=>['index','create',
            'store','destroy']]); 
        });

        
    });

    
});