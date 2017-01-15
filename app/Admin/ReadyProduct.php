<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\ReadyProduct;

AdminSection::registerModel(ReadyProduct::class, function (ModelConfiguration $model){
    $model->setTitle('Test');

    $model->onDisplay(function (){
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::image('patternAccordance.image','Чертеж'),
            AdminColumn::relatedLink('form.name','Тип конструкции'),
            AdminColumn::text('width','Ширина'),
            AdminColumn::text('length','Длинна'),
            AdminColumn::relatedLink('blankType.name','Тип заготовки'),
            AdminColumn::relatedLink('decorCategory.name','Категория декора'),
            AdminColumn::relatedLink('decor.name','Декор'),
            AdminColumn::relatedLink('coast','Цена'),
        ]);
        $display->paginate(10);
        $display->setHtmlAttribute('class', 'table2 text-center');
        return $display;
    });

    $model->onEdit(function (){
        $form = AdminForm::panel()->addBody([
            AdminFormElement::select('pattern_accordance_id','Чертеж')->setReadonly(true)
                ->setModelForOptions(new \App\PatternAccordance())->setDisplay('name'),
            AdminFormElement::text('width','Ширина')->setReadonly(true),
            AdminFormElement::text('length','Длинна')->setReadonly(true),
            AdminFormElement::text('coast','Цена')->setReadonly(true),
            AdminFormElement::select('blank_type_id','Тип заготовки')->setReadonly(true)
                ->setModelForOptions(new \App\BlankType())->setDisplay('name'),
            AdminFormElement::select('form_id','Тип конструкции')->setReadonly(true)
                ->setModelForOptions(new \App\Form())->setDisplay('name'),
            AdminFormElement::select('decor_category_id','Категория декора')->required()
                ->setModelForOptions(new \App\DecorCategory())->setDisplay('name'),
            AdminFormElement::select('decor_id','Декор')->setReadonly(true)
                ->setModelForOptions(new \App\Decor())->setDisplay('name'),
            AdminFormElement::select('wrapper_id','Упаковка')->setReadonly(true)
                ->setModelForOptions(new \App\Wrapper())->setDisplay('name'),
            AdminFormElement::select('nip_id','Завал')->setReadonly(true)
                ->setModelForOptions(new \App\Nip())->setDisplay('name'),
            AdminFormElement::select('part_side_one','С-1')->setReadonly(true)
                ->setModelForOptions(new \App\PatternOption())->setDisplay('name'),
            AdminFormElement::select('part_side_two','С-2')->setReadonly(true)
                ->setModelForOptions(new \App\PatternOption())->setDisplay('name'),
            AdminFormElement::select('part_side_three','С-3')->setReadonly(true)
                ->setModelForOptions(new \App\PatternOption())->setDisplay('name'),
            AdminFormElement::select('part_side_four','С-4')->setReadonly(true)
                ->setModelForOptions(new \App\PatternOption())->setDisplay('name'),
            AdminFormElement::select('part_edge_one','Угол-1')->setReadonly(true)
                ->setModelForOptions(new \App\PatternOption())->setDisplay('name'),
            AdminFormElement::select('part_edge_two','Угол-2')->setReadonly(true)
                ->setModelForOptions(new \App\PatternOption())->setDisplay('name'),
            AdminFormElement::select('part_edge_three','Угол-3')->setReadonly(true)
                ->setModelForOptions(new \App\Thickness())->setDisplay('name'),
            AdminFormElement::select('part_edge_four','Угол-4')->setReadonly(true)
                ->setModelForOptions(new \App\PatternOption())->setDisplay('name'),
            AdminFormElement::select('edge_one','Кромка - 1')->setReadonly(true)
                ->setModelForOptions(new \App\EdgeCategory())->setDisplay('name'),
            AdminFormElement::select('edge_two','Кромка - 2')->setReadonly(true)
                ->setModelForOptions(new \App\EdgeCategory())->setDisplay('name'),
            AdminFormElement::select('edge_three','Кромка - 3')->setReadonly(true)
                ->setModelForOptions(new \App\EdgeCategory())->setDisplay('name'),
            AdminFormElement::select('edge_four','Кромка - 4')->setReadonly(true)
                ->setModelForOptions(new \App\EdgeCategory())->setDisplay('name'),

        ]);
        $form->getButtons()
            ->setCancelButtonText('Close')
            ->hideDeleteButton()
            ->hideSaveAndCloseButton()
            ->hideSaveAndCreateButton();
        return $form;
    });
});