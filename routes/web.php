<?php

Route::get('/', ['as' => 'index', 'uses' => 'IndexController@index']);

Route::group(['prefix' => 'api'], function (){
   Route::get('items/{id}', ['as' => 'api.items', 'uses' => 'ItemsController@showItem']);
});

Route::group(['prefix' => 'items'], function (){
    Route::get('/', ['as' => 'items', 'uses' => 'ItemsController@index']);
    Route::post('create', ['as' => 'items.create', 'uses' => 'ItemsController@create']);
    Route::post('edit/{id}', ['as' => 'items.edit', 'uses' => 'ItemsController@edit']);
    Route::get('delete/{id}', ['as' => 'items.delete', 'uses' => 'ItemsController@destroy']);
});

Route::group(['prefix' => 'categories'], function (){
    Route::get('/', ['as' => 'categories', 'uses' => 'CategoriesController@index']);
    Route::get('/{id}', ['as' => 'categories.show', 'uses' => 'CategoriesController@showItems']);
    Route::post('create', ['as' => 'categories.create', 'uses' => 'CategoriesController@create']);
    Route::post('edit/{id}', ['as' => 'categories.edit', 'uses' => 'CategoriesController@edit']);
    Route::get('delete/{id}', ['as' => 'categories.delete', 'uses' => 'CategoriesController@destroy']);
});
