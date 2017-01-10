<?php

Route::get('', ['as' => 'admin.dashboard', function () {
	$content = 'Define your dashboard here.';
	return AdminSection::view($content, 'Dashboard');
}]);

Route::get('information', ['as' => 'admin.information', function () {
	$content = 'Define your information here.';
	return AdminSection::view($content, 'Information');
}]);

Route::group(['prefix' => 'information'],function (){

    Route::get('orders',[ 'as' => 'docs.orders', function(){
        $content = view('docs.order');
        return AdminSection::view($content,'Секция "Заказы"');
    } ]);

    Route::get('users',[ 'as' => 'docs.users', function(){
        $content = view('docs.user');
        return AdminSection::view($content,'Секция "Пользователи"');
    } ]);

    Route::get('decors',[ 'as' => 'docs.decors', function(){
        $content = view('docs.decor');
        return AdminSection::view($content,'Секция "Декоры"');
    } ]);

});

