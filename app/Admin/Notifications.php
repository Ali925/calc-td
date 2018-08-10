<?php

use App\Notifications;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(Notifications::class, function (ModelConfiguration $model){
    $model->setTitle('Уведомлении');

    $model->onDisplay(function (){
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::text('type','Модель'),
            AdminColumn::text('text','Текст'),

        ]);
        $display->paginate(10);
        return $display;
    });

    $model->onCreateAndEdit(function (){
        $form = AdminForm::panel()->addBody([
            AdminFormElement::select('type','Модель', array('1' => 'Пожалуйста, введите корректное значение размера еврозапила.')),
            AdminFormElement::text('text','Текст'),
        ]);

        return $form;
    });
})->addMenuPage(Notifications::class, 99)->setIcon('fa fa-exclamation-circle')->setAccessLogic(function (){
    return auth()->user()->isAdmin();
});