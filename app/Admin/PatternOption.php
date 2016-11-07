<?php

use App\PatternOption;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(PatternOption::class, function (ModelConfiguration $model){
    $model->setTitle('Опции чертежа');

    $model->onDisplay(function (){
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::text('name','Наименование'),
            AdminColumn::image('image','Изображение'),
            AdminColumn::text('description','Описание'),
        ]);
        $display->paginate(10);
        return $display;
    });

    $model->onCreateAndEdit(function (){
        $form = AdminForm::panel()->addBody([
            AdminFormElement::text('name','Наименование'),
            AdminFormElement::image('image','Изображение'),
            AdminFormElement::wysiwyg('description','Описание'),
        ]);

        return $form;
    });
})->addMenuPage(PatternOption::class, 8)->setIcon('fa fa-cubes');