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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'items'], function (){
    Route::get('/', ['as' => 'Items', 'uses' => 'ItemsController@index']);
    Route::post('create', ['as' => 'items.create', 'uses' => 'ItemsController@create']);
    Route::post('edit/{id}', ['as' => 'items.edit', 'uses' => 'ItemsController@edit']);
    Route::get('delete/{id}', ['as' => 'items.delete', 'uses' => 'ItemsController@destroy']);
});
