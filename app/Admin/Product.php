<?php
use App\Product;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(Product::class, function (ModelConfiguration $model){
    $model->setTitle('Заготовки');

    $model->onDisplay(function (){
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::relatedLink('blankType.name','Тип заготовки'),
            AdminColumn::relatedLink('decorCategory.name','Серия декора'),
            AdminColumn::relatedLink('thickness.name','Толщина'),
            AdminColumn::relatedLink('nip.value','Завал'),
            AdminColumn::text('length','Длина'),
            AdminColumn::text('width','Ширина'),
            AdminColumn::text('coast','Цена'),
        ]);
        $display->paginate(10);
        return $display;
    });

    $model->onCreateAndEdit(function (){

        $form = AdminForm::panel()->addBody([
            AdminFormElement::select('blank_type_id','Тип заготовки')
                ->setModelForOptions(\App\BlankType::class)->setDisplay('name'),
            AdminFormElement::select('decor_category_id','Серия декора')
                ->setModelForOptions(\App\DecorCategory::class)->setDisplay('name'),
            AdminFormElement::select('thickness_id','Толщина')
                ->setModelForOptions(\App\Thickness::class)->setDisplay('name'),
            AdminFormElement::select('nip_id','Завал')
                ->setModelForOptions(\App\Nip::class)->setDisplay('name'),
            AdminFormElement::text('length','Длина'),
            AdminFormElement::text('width','Ширина'),
            AdminFormElement::text('coast','Цена'),

        ]);

        return $form;
    });
});