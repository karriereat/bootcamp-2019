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

Route::get('/', 'ArticlesController@list');
Route::get('/author/{userId}', 'ArticlesController@author');
Route::get('/category/{categoryId}', 'ArticlesController@category');
Route::get('/article/{id}', 'ArticlesController@detail');
