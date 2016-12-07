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
            AdminColumn::image('pattern_image','Чертеж'),
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
            AdminFormElement::image('pattern_image','Чертеж'),
            AdminFormElement::multiselect('blankTypes', 'Продукт')
                ->setModelForOptions(new \App\BlankType())->setDisplay('name'),
            AdminFormElement::multiselect('option_edge_1', 'Угол 1')
                ->setModelForOptions(new \App\PatternOption())->setDisplay('name'),
            AdminFormElement::multiselect('option_edge_2', 'Угол 2')
                ->setModelForOptions(new \App\PatternOption())->setDisplay('name'),
            AdminFormElement::multiselect('option_edge_3', 'Угол 3')
                ->setModelForOptions(new \App\PatternOption())->setDisplay('name'),
            AdminFormElement::multiselect('option_edge_4', 'Угол 4')
                ->setModelForOptions(new \App\PatternOption())->setDisplay('name'),
            AdminFormElement::multiselect('option_side_1', 'Сторона 1')
                ->setModelForOptions(new \App\PatternOption())->setDisplay('name'),
            AdminFormElement::multiselect('option_side_2', 'Сторона 2')
                ->setModelForOptions(new \App\PatternOption())->setDisplay('name'),
            AdminFormElement::multiselect('option_side_3', 'Сторона 3')
                ->setModelForOptions(new \App\PatternOption())->setDisplay('name'),
            AdminFormElement::multiselect('option_side_4', 'Сторона 4')
                ->setModelForOptions(new \App\PatternOption())->setDisplay('name'),
        ]);

        return $form;
    });
});