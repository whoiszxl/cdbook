<?php


//admin后台
Route::group(['prefix' => 'admin'], function(){
    

    Route::get('/login', function(){
        return "hi dd";
    });

});