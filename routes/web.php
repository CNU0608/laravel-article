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

Route::get('/', 'ArticleController@index');

Route::get('article/create', 'ArticleController@create');

Route::get('article/{id}', 'ArticleController@show');

Route::post('article/store', 'ArticleController@store');

Route::get('article/edit/{id}', 'ArticleController@edit');

Route::post('article/update', 'ArticleController@update');