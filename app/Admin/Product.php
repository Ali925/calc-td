<?php
use App\Product;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(Product::class, function (ModelConfiguration $model){
    $model->setTitle('Тип заготовки');

    $model->onDisplay(function (){
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::text('name','Наименование'),
            AdminColumn::text('max_length', 'Макс. длин.'),
            AdminColumn::text('min_length', 'Мин. длин.'),
            AdminColumn::text('max_width', 'Макс. шир.'),
            AdminColumn::text('min_width', 'Мин. шир.'),
            AdminColumn::lists('forms.name','Типы констр-ии'),
            AdminColumn::lists('thicknesses.name','Толщина'),
            AdminColumn::lists('nips.name','Завал'),
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
            AdminFormElement::multiselect('thicknesses', 'Толщина')
                ->setModelForOptions(new \App\Thickness())->setDisplay('name'),
            AdminFormElement::multiselect('nips', 'Завал')
                ->setModelForOptions(new \App\Nip())->setDisplay('name'),
        ]);

        return $form;
    });
})->addMenuPage(Product::class, 6)->setIcon('fa fa-cube');