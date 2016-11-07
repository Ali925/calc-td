<?php

use App\Thickness;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(Thickness::class, function (ModelConfiguration $model){
    $model->setTitle('Толщины');

    $model->onDisplay(function (){
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::text('name','Наименование'),
            AdminColumn::text('value','Значение'),
        ]);
        $display->paginate(10);
        return $display;
    });

    $model->onCreateAndEdit(function (){
        $form = AdminForm::panel()->addBody([
            AdminFormElement::text('name','Наименование'),
            AdminFormElement::text('value','Значение'),
        ]);

        return $form;
    });
})->addMenuPage(Thickness::class, 9)->setIcon('fa fa-cubes');