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

Route::get('markdown', function() {
    return view('foo');
});

Route::get('/', 'PageController@root')->name('root');
Route::put('page/count', 'PageController@clickCount')->name('page.count');
Route::get('category/{id}', 'CategoryController@index')->name('category.index');

Route::get('recommend', 'PageController@recommend')->name('page.recommend');
Route::post('recommend', 'PageController@addTool')->name('page.recommend');

Route::get('search', 'SearchController@index')->name('search.index');


Route::get('articles', 'ArticlesController@index')->name('article.index');
Route::get('articles/{id}', 'ArticlesController@show')->name('article.show');

Route::post('uploadImage', 'PageController@mdUploadIamge')->name('recommend.uploadImage');
