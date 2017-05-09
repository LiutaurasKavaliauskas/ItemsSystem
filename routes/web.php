<?php

Route::group(['prefix' => 'items'], function (){
    Route::get('/', ['as' => 'Items', 'uses' => 'ItemsController@index']);
    Route::post('create', ['as' => 'items.create', 'uses' => 'ItemsController@create']);
    Route::post('edit/{id}', ['as' => 'items.edit', 'uses' => 'ItemsController@edit']);
    Route::get('delete/{id}', ['as' => 'items.delete', 'uses' => 'ItemsController@destroy']);
});

Route::group(['prefix' => 'categories'], function (){
    Route::get('/', ['as' => 'Categories', 'uses' => 'CategoriesController@index']);
    Route::post('create', ['as' => 'categories.create', 'uses' => 'CategoriesController@create']);
    Route::post('edit/{id}', ['as' => 'categories.edit', 'uses' => 'CategoriesController@edit']);
    Route::get('delete/{id}', ['as' => 'categories.delete', 'uses' => 'CategoriesController@destroy']);
});
