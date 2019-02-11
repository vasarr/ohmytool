<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');

    $router->get('tools', 'ToolsController@index');
    $router->get('tools/create', 'ToolsController@create');
    $router->post('tools', 'ToolsController@store');
    $router->get('tools/{id}/edit', 'ToolsController@edit');
    $router->put('tools/{id}', 'ToolsController@update');

    $router->get('categories', 'CategoriesController@index');
    $router->get('categories/create', 'CategoriesController@create');
    $router->get('categories/{id}/edit', 'CategoriesController@edit');
    $router->post('categories', 'CategoriesController@store');
    $router->put('categories/{id}', 'CategoriesController@update');
    $router->delete('categories/{id}', 'CategoriesController@destroy');

    $router->get('api/categories', 'CategoriesController@apiIndex');

    $router->get('articles', 'ArticlesController@index');
    $router->get('articles/create', 'ArticlesController@create');
    $router->post('articles', 'ArticlesController@store');
    $router->get('articles/{id}/edit', 'ArticlesController@edit');
    $router->put('articles/{id}', 'ArticlesController@update');

    Route::post('upload_image', 'ArticlesController@uploadImage')->name('articles.uploadImage');
});
