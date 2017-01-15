<?php

use App\PatternPosition;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(PatternPosition::class, function (ModelConfiguration $model){
    $model->setTitle('Позиции чертежа');
    $model->disableDeleting();

    $model->onDisplay(function (){
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::text('name','Наименование'),
            AdminColumn::lists('options.name','Опции'),
        ]);
        $display->paginate(10);
        return $display;
    });

    $model->onEdit(function (){
        $form = AdminForm::panel()->addBody([
            AdminFormElement::text('name','Наименование'),
            AdminFormElement::multiselect('options', 'Опции')
                ->setModelForOptions(new \App\PatternOption())
                ->setLoadOptionsQueryPreparer(function ($item,$query){
                    return $query->orderBy('name','asc');
                })
                ->setDisplay('name'),
        ]);

        return $form;
    });
});