<?php

use App\Nip;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(Nip::class, function (ModelConfiguration $model){
    $model->setTitle('Завалы');

    $model->onDisplay(function (){
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::text('name','Наименование'),
            AdminColumn::text('value','Значение'),
            AdminColumn::text('description','Описание'),
        ]);
        $display->paginate(10);
        return $display;
    });

    $model->onCreateAndEdit(function (){
        $form = AdminForm::panel()->addBody([
            AdminFormElement::text('name','Наименование'),
            AdminFormElement::text('value','Значение'),
            AdminFormElement::wysiwyg('description','Описание'),
        ]);

        return $form;
    });
})->addMenuPage(Nip::class, 8)->setIcon('fa fa-cubes');