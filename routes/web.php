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



Route::get('/', 'PageController@root')->name('root');
Route::put('page/count', 'PageController@clickCount')->name('page.count');
Route::get('category/{id}', 'CategoryController@index')->name('category.index');
