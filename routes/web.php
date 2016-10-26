<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'api'], function (){

    Route::group(['prefix' => 'product'],function (){
        Route::get('get/all','ProductController@getAll');
        Route::get('get/{id}','ProductController@getById');
    });

    Route::group(['prefix' => 'form'],function (){
        Route::get('get/all','FormController@getAll');
        Route::get('get/{id}','FormController@getById');
    });

});

Auth::routes();

Route::get('/home', 'HomeController@index');
