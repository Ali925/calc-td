<?php

use App\BlankType;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(BlankType::class, function (ModelConfiguration $model){
    $model->setTitle('Тип заготовки');

    $model->onDisplay(function (){
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::text('name','Наименование'),
            AdminColumn::text('description','Описание'),

        ]);
        $display->paginate(10);
        return $display;
    });

    $model->onCreateAndEdit(function (){
        $form = AdminForm::panel()->addBody([
            AdminFormElement::text('name','Наименование'),
            AdminFormElement::wysiwyg('description','Описание'),
        ]);

        return $form;
    });
});