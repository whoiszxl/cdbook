<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers;

/*文章路由 */
//文章列表页
Route::get('/article', 'ArticleController@index');
//创建文章
Route::get('/article/create', 'ArticleController@create');
Route::post('/article', 'ArticleController@store');
//文章详情页
Route::get('/article/{article}', 'ArticleController@show');
//编辑文章
Route::get('/article/edit/{article}', 'ArticleController@edit');
Route::put('/article/{article}', 'ArticleController@update');
//删除文章
Route::get('/article/delete', 'ArticleController@delete');
