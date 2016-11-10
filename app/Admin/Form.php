<?php
use App\Form;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(Form::class, function (ModelConfiguration $model){
    $model->setTitle('Тип конструкции');

    $model->onDisplay(function (){
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::text('name','Наименование'),
            AdminColumn::text('coast','Цена'),
            AdminColumn::image('image','Изображение'),
            AdminColumn::lists('blankTypes.name','Типы заготовок'),
        ]);
        $display->paginate(10);
        return $display;
    });

    $model->onCreateAndEdit(function (){
        $form = AdminForm::panel()->addBody([
            AdminFormElement::text('name','Наименование'),
            AdminFormElement::text('coast','Цена'),
            AdminFormElement::image('image','Изображение'),
            AdminFormElement::multiselect('blankTypes', 'Продукт')
                ->setModelForOptions(new \App\BlankType())->setDisplay('name'),
        ]);

        return $form;
    });
});