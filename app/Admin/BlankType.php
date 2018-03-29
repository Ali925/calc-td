<?php

use App\BlankType;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(BlankType::class, function (ModelConfiguration $model){
    $model->setTitle('Тип заготовки');

    $model->onDisplay(function (){
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::text('name','Наименование'),
            AdminColumn::text('min_width','Мин. ширина'),
            AdminColumn::text('max_width','Макс. ширина'),
            AdminColumn::text('min_length','Мин. длина'),
            AdminColumn::text('max_length','Макс. длина'),
            AdminColumn::lists('thicknesses.name','Толщинны'),
            AdminColumn::text('description','Описание'),
            AdminColumn::lists('decors.name','Декоры')
        ]);
        $display->setApply(function ($query){
            $query->orderBy('name', 'asc');
        });
        $display->paginate(10);
        return $display;
    });

    $model->onCreateAndEdit(function (){
        $form = AdminForm::panel()->addBody([
            AdminFormElement::text('name','Наименование'),
            AdminFormElement::text('min_width','Мин. ширина'),
            AdminFormElement::text('max_width','Макс. ширина'),
            AdminFormElement::text('min_length','Мин. длина'),
            AdminFormElement::text('max_length','Макс. длина'),
            AdminFormElement::multiselect('thicknesses','Толщины')
                ->setModelForOptions(new \App\Thickness())
                ->setLoadOptionsQueryPreparer(function ($item,$query){
                    return $query->orderBy('name','asc');
                })
                ->setDisplay('name'),
            AdminFormElement::wysiwyg('description','Описание'),
            AdminFormElement::multiselect('decors','Декоры')
                ->setModelForOptions(new \App\Decor())
                ->setLoadOptionsQueryPreparer(function ($item,$query){
                    return $query->orderBy('name','asc');
                })
                ->setDisplay('name'),
            // AdminFormElement::custom()
            //     ->setDisplay(function ($instance)
            // {
            //     return view('my-form-item', ['instance' => $instance]);
            // })
            //     ->setCallback(function ($instance)
            // {
            //     $instance->myField = 12;
            // })    
        ]);

        return $form;
    });
});