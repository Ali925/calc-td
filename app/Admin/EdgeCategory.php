<?php

use App\EdgeCategory;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(EdgeCategory::class, function (ModelConfiguration $model){
    $model->setTitle('Серии кромок');

    $model->onDisplay(function (){
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::text('name','Наименование'),
            AdminColumn::text('coast','Цена'),
            AdminColumn::custom('Эгоист',function (\Illuminate\Database\Eloquent\Model $model){
                if ($model->egoist == 1) return 'Да';
                else return 'Нет';
            }),
        ]);
        //$display->paginate(10);
        return $display;
    });

    $model->onCreateAndEdit(function (){
        $form = AdminForm::panel()->addBody([
            AdminFormElement::text('name', 'Наименование')->required(),
            AdminFormElement::text('coast', 'Цена')->required(),
            AdminFormElement::checkbox('egoist', 'Эгоист')->required(),

        ]);

        return $form;
    });
});