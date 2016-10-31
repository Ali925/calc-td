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
            AdminColumn::lists('products.name','Типы заготовок'),
        ]);
        $display->paginate(10);
        return $display;
    });

    $model->onCreateAndEdit(function (){
        $form = AdminForm::panel()->addBody([
            AdminFormElement::text('name','Наименование'),
            AdminFormElement::text('coast','Цена'),
            AdminFormElement::image('image','Изображение'),
            AdminFormElement::multiselect('products', 'Продукт')
                ->setModelForOptions(new \App\Product())->setDisplay('name'),
        ]);

        return $form;
    });
})->addMenuPage(Form::class, 3)->setIcon('fa fa-cubes');