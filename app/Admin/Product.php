<?php
use App\Product;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(Product::class, function (ModelConfiguration $model){
    $model->setTitle('Тип заготовки');

    $model->onDisplay(function (){
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::text('name','Наименование'),
            AdminColumn::text('max_length', 'Максимальная длинна'),
            AdminColumn::text('min_length', 'Минимальная длинна'),
            AdminColumn::text('max_width', 'Максимальная ширина'),
            AdminColumn::text('min_width', 'Минимальная ширина'),
            AdminColumn::lists('forms.name','Типы конструкции'),
        ]);
        $display->paginate(10);
        return $display;
    });

    $model->onCreateAndEdit(function (){
        $form = AdminForm::panel()->addBody([
            AdminFormElement::text('name','Наименование'),
            AdminFormElement::text('max_length', 'Максимальная длинна'),
            AdminFormElement::text('min_length', 'Минимальная длинна'),
            AdminFormElement::text('max_width', 'Максимальная ширина'),
            AdminFormElement::text('min_width', 'Минимальная ширина'),
            AdminFormElement::multiselect('forms', 'Тип конструкции')
                ->setModelForOptions(new \App\Form())->setDisplay('name'),
        ]);

        return $form;
    });
})->addMenuPage(Product::class, 3)->setIcon('fa fa-cube');