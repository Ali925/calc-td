<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\PatternAccordance;

AdminSection::registerModel(PatternAccordance::class, function (ModelConfiguration $model){
    $model->setTitle('Опции чертежа');

    $model->onDisplay(function (){
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::text('name','Наим.'),
            AdminColumn::image('image','Изобр.'),
            AdminColumn::text('thickness','Толщ.'),
            AdminColumn::text('edge_one','Кромка 1'),
            AdminColumn::text('edge_two','Кромка 2'),
            AdminColumn::text('edge_three','Кромка 3'),
            AdminColumn::text('edge_four','Кромка 4'),
            AdminColumn::text('blank_type','Тип заг.'),
            AdminColumn::text('nip','Завал'),
            AdminColumn::text('euro','Еврозапил'),
            AdminColumn::text('radius','Радиус'),
            AdminColumn::text('bevel','Скос'),
            AdminColumn::text('standard','Станд. соед.'),
        ]);
        $display->paginate(10);
        return $display;
    });

    $model->onCreateAndEdit(function (){
        $form = AdminForm::panel()->addBody([
            AdminFormElement::text('name','Наименование'),
            AdminFormElement::image('image','Изображение'),
            AdminFormElement::select('thickness','Толщ.')
                ->setModelForOptions(new \App\Thickness())->setDisplay('name'),
            AdminFormElement::multiselect('edge_one','Кромка 1')
                ->setModelForOptions(new \App\EdgeCategory())->setDisplay('name'),
            AdminFormElement::multiselect('edge_two','Кромка 2')
                ->setModelForOptions(new \App\EdgeCategory())->setDisplay('name'),
            AdminFormElement::multiselect('edge_three','Кромка 3')
                ->setModelForOptions(new \App\EdgeCategory())->setDisplay('name'),
            AdminFormElement::multiselect('edge_four','Кромка 4')
                ->setModelForOptions(new \App\EdgeCategory())->setDisplay('name'),
            AdminFormElement::select('blank_type','Тип заг.')
                ->setModelForOptions(new \App\BlankType())->setDisplay('name'),
            AdminFormElement::select('nip','Завал')
                ->setModelForOptions(new \App\Nip())->setDisplay('name'),
            AdminFormElement::multiselect('euro','Еврозапил')
                ->setModelForOptions(new \App\PatternPosition())->setDisplay('name'),
            AdminFormElement::multiselect('radius','Радиус')
                ->setModelForOptions(new \App\PatternPosition())->setDisplay('name'),
            AdminFormElement::multiselect('bevel','Скос')
                ->setModelForOptions(new \App\PatternPosition())->setDisplay('name'),
            AdminFormElement::multiselect('standard','Станд. соед.')
                ->setModelForOptions(new \App\PatternPosition())->setDisplay('name'),
        ]);

        return $form;
    });
});
