<?php

use App\ErrorNotifications;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(ErrorNotifications::class, function (ModelConfiguration $model){
    $model->setTitle('Уведомлении');

    $model->onDisplay(function (){
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::custom('Тип', function(\Illuminate\Database\Eloquent\Model $model){
                $type = $model->type;
                $arr = array('1' => 'Некорректное значение размера еврозапила');
                return $arr[$type];
            }),
            AdminColumn::text('text','Текст'),

        ]);
        $display->paginate(10);
        return $display;
    });

    $model->onCreateAndEdit(function (){
        $form = AdminForm::panel()->addBody([
            AdminFormElement::select('type','Тип', array('1' => 'Некорректное значение размера еврозапила')),
            AdminFormElement::text('text','Текст'),
        ]);

        return $form;
    });
})->addMenuPage(ErrorNotifications::class, 99)->setIcon('fa fa-exclamation-circle')->setAccessLogic(function (){
    return auth()->user()->isAdmin();
});