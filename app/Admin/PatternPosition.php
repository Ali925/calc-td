<?php

use App\PatternPosition;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(PatternPosition::class, function (ModelConfiguration $model){
    $model->setTitle('Позиции чертежа');
    $model->disableDeleting();

    $model->onDisplay(function (){
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::text('name','Наименование'),
            AdminColumn::lists('pattern_options.name','Опции'),
        ]);
        $display->paginate(10);
        return $display;
    });

    $model->onEdit(function (){
        $form = AdminForm::panel()->addBody([
            AdminFormElement::text('name','Наименование'),
            AdminFormElement::multiselect('pattern_options', 'Опции')
                ->setModelForOptions(new \App\PatternOption())->setDisplay('name'),
        ]);

        return $form;
    });
})->addMenuPage(PatternPosition::class, 8)->setIcon('fa fa-cubes');