<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\EdgeDecor;

AdminSection::registerModel(EdgeDecor::class, function (ModelConfiguration $model){
    $model->setTitle('Декор Кромки');

    $model->onDisplay(function (){
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::text('name','Наименование'),
            AdminColumn::text('code','Код'),
            AdminColumn::image('image','Изображение'),
            AdminColumn::relatedLink('edgeCategory.name','Серия'),
        ]);
        $display->paginate(10);
        return $display;
    });

    $model->onCreateAndEdit(function (){
        $form = AdminForm::panel()->addBody([
            AdminFormElement::text('name', 'Name')->required()->unique(),
            AdminFormElement::text('code', 'Сode')->required()->unique(),
            AdminFormElement::image('image', 'Image')->required()->addValidationRule('image'),
            AdminFormElement::select('edge_category_id', 'Series')
                ->setModelForOptions(new \App\EdgeCategory())->setDisplay('name'),
        ]);

        return $form;
    });
})->addMenuPage(EdgeDecor::class, 5)->setIcon('fa fa-file-photo-o');