<?php
use App\ConfigPayment;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(ConfigPayment::class, function (ModelConfiguration $model){
    $model->setTitle('Конфигурация плтежей');

    $model->onDisplay(function (){
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::text('option','Опция'),
            AdminColumn::text('value','Значение'),
        ]);
        $display->paginate(10);
        return $display;
    });

    $model->onCreateAndEdit( function (){
        $form = AdminForm::panel()->addBody([
            AdminFormElement::text('option','Опция'),
            AdminFormElement::text('value','Значение'),
        ]);

        return $form;
    });
})->addMenuPage(ConfigPayment::class, 99)->setIcon('fa fa-gear');