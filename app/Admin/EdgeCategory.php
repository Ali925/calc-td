<?php

use App\EdgeCategory;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(EdgeCategory::class, function (ModelConfiguration $model){
    $model->setTitle('Серии кромок');

    $model->onDisplay(function (){
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::text('name','Name'),
            AdminColumn::text('coast','Coast'),
        ]);
        //$display->paginate(10);
        return $display;
    });

    $model->onCreateAndEdit(function (){
        $form = AdminForm::panel()->addBody([
            AdminFormElement::text('name', 'Name')->required()->unique(),
            AdminFormElement::text('coast', 'Coast')->required()->unique(),
        ]);

        return $form;
    });
});