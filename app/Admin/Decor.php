<?php

use App\Decor;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(Decor::class, function (ModelConfiguration $model){
    $model->setTitle('Декор');

    $model->onDisplay(function (){
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::text('name','Наименование'),
            AdminColumn::text('code','Код'),
            AdminColumn::image('image','Изображение'),
            AdminColumn::relatedLink('decorCategory.name','Серия'),
        ]);
        $display->paginate(10);
        return $display;
    });

    $model->onCreateAndEdit(function (){
        $form = AdminForm::panel()->addBody([
            AdminFormElement::text('name', 'Name')->required(),
            AdminFormElement::text('code', 'Сode')->required(),
            AdminFormElement::image('image', 'Image')->required(),
            AdminFormElement::select('decor_category_id', 'Series', \App\DecorCategory::getList()),
        ])->setHtmlAttribute('enctype', 'multipart/form-data');;

        return $form;
    });
});