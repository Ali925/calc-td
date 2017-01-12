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

    Route::get('construct-type',[ 'as' => 'docs.construct-type', function(){
        $content = view('docs.construct-type');
        return AdminSection::view($content,'Секция "Тип конструкции"');
    } ]);

    Route::get('blank-type',[ 'as' => 'docs.blank-type', function(){
        $content = view('docs.blank-type');
        return AdminSection::view($content,'Секция "Тип заготовки"');
    } ]);

    Route::get('product',[ 'as' => 'docs.product', function(){
        $content = view('docs.product');
        return AdminSection::view($content,'Секция "Зготовки"');
    } ]);

    Route::get('nips',[ 'as' => 'docs.nips', function(){
        $content = view('docs.nips');
        return AdminSection::view($content,'Секция "Завалы"');
    } ]);

    Route::get('thickness',[ 'as' => 'docs.thickness', function(){
        $content = view('docs.thickness');
        return AdminSection::view($content,'Секция "Толщина"');
    } ]);

    Route::get('wrapper',[ 'as' => 'docs.wrapper', function(){
        $content = view('docs.wrapper');
        return AdminSection::view($content,'Секция "Упаковка"');
    } ]);

});

