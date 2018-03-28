<?php

use App\OrderEmail;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(OrderEmail::class, function (ModelConfiguration $model){
    $model->setTitle('Почта заказ');

    $model->onDisplay(function (){
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::text('name','ФИО'),
            AdminColumn::text('email','Почта'),

        ]);
        $display->paginate(10);
        return $display;
    });

    $model->onCreateAndEdit(function (){
        $form = AdminForm::panel()->addBody([
            AdminFormElement::text('name','ФИО'),
            AdminFormElement::text('email','Почта'),
        ]);

        return $form;
    });
})->addMenuPage(OrderEmail::class, 99)->setIcon('fa fa-gear')->setAccessLogic(function (){
    return auth()->user()->isAdmin();
});