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

    Route::group(['prefix' => 'data'], function (){
        Route::get('first', 'MainController@getFirstData');
        Route::get('main','MainController@allPage');
        Route::get('body','MainController@getBodyPage');
    });

    Route::group(['prefix' => 'product'],function (){
        Route::get('get/all','ProductController@getAll');
        Route::get('get/{id}','ProductController@getById');
        Route::post('post/blank','ProductController@getByParameter');
    });

    Route::group(['prefix' => 'form'],function (){
        Route::get('get/all','FormController@getAll');
        Route::get('get/{id}','FormController@getById');
    });

    Route::group(['prefix' => 'decor'],function (){
            Route::get('get/all','DecorController@getAll');
        Route::get('get/{id}','DecorController@getById');
    });

    Route::group(['prefix' => 'category'],function (){
        Route::get('get/all','DecorCategoryController@getAll');
        Route::get('get/{id}','DecorCategory@getById');
    });
    Route::group(['prefix' => 'edge'], function (){
        Route::group(['prefix' => 'decor'], function (){
            Route::get('get/all','EdgeDecorController@getAll');
        });
        Route::group(['category'], function (){
            Route::get('get/all','EdgeCategoryController@getAll');
        });
    });

    Route::group(['prefix' => 'pattern'],function (){
        Route::get('get/all', 'PatternController@getAll');
        Route::post('post/check', 'PatternController@notEmptyPattern');
        Route::post('post/result', 'PatternController@getPatternByParameter');
    });

    Route::group(['prefix' => 'order'], function (){
        Route::post('post/order','OrderController@setOrder');
        Route::post('post/customer','OrderController@setCustomer');
        Route::post('post/ready','OrderController@setReadyProduct');
    });

    Route::post('post/print', 'MainController@getPrint');


});
    Route::get('/ok', 'PaymentController@setOk');

Auth::routes();

Route::get('/home', 'HomeController@index');

