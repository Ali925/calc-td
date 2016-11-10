<?php

use App\Thickness;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(Thickness::class, function (ModelConfiguration $model){
    $model->setTitle('Толщины');

    $model->onDisplay(function (){
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::text('name','Наименование'),
            AdminColumn::text('value','Значение'),
            AdminColumn::lists('nips.name','Значение'),
        ]);
        $display->paginate(10);
        return $display;
    });

    $model->onCreateAndEdit(function (){
        $form = AdminForm::panel()->addBody([
            AdminFormElement::text('name','Наименование'),
            AdminFormElement::text('value','Значение'),
            AdminFormElement::multiselect('nips','Завалы')
                ->setModelForOptions(new \App\Nip())->setDisplay('name'),
        ]);

        return $form;
    });
});