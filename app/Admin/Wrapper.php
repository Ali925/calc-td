<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Wrapper;

AdminSection::registerModel(Wrapper::class, function (ModelConfiguration $model){
    $model->setTitle('Упаковка');

    $model->onDisplay(function (){
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::text('width','Ширина'),
            AdminColumn::text('length','Длинна'),
            AdminColumn::text('coast','Цена'),

        ]);
        $display->paginate(10);
        return $display;
    });

    $model->onCreateAndEdit(function (){
        $form = AdminForm::panel()->addBody([
            AdminFormElement::text('width','Ширина'),
            AdminFormElement::text('length','Длинна'),
            AdminFormElement::wysiwyg('coast','Цена'),
        ]);

        return $form;
    });
});