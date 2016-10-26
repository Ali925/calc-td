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
    
//Product route
Route::get('api/product/get/all','ProductController@getAll');
Route::get('api/product/get/{id}','ProductController@getById');

//Form route
Route::get('api/form/get/all','FormController@getAll');
Route::get('api/form/get/{id}','FormController@getById');






Auth::routes();

Route::get('/home', 'HomeController@index');
