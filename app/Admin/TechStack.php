<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\TechStack;

AdminSection::registerModel(TechStack::class, function (ModelConfiguration $model){
    $model->setTitle('Тех. документация');

    $model->onDisplay(function (){
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::text('name','Название'),

        ]);
        $display->paginate(10);
        return $display;
    });

    $model->onCreateAndEdit(function (){
        $form = AdminForm::panel()->addBody([
            AdminFormElement::text('name','Название'),
            AdminFormElement::file('file','Длинна'),
        ]);

        return $form;
    });
})->addMenuPage(TechStack::class, 99)->setIcon('fa fa-gear');