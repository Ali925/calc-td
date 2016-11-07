<?php

use App\DecorCategory;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(DecorCategory::class, function (ModelConfiguration $model){
    $model->setTitle('Серии декора');

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