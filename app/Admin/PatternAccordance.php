<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\PatternAccordance;

AdminSection::registerModel(PatternAccordance::class, function (ModelConfiguration $model){
    $model->setTitle('Соответствие чертежей');
    Assets::addJS('admin-table',asset('js/admin-table.js'),true,true);

    $model->onDisplay(function (){
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::text('name','Наим.')->setWidth('100px'),
            AdminColumn::image('image','Изобр.')->setWidth('100px'),
            AdminColumn::relatedLink('thickness.value','Толщ.'),
            AdminColumn::relatedLink('form.name','Констр.'),
//            AdminColumn::lists('patternEdgeDecorsOne.name','К-1')->setWidth('100px'),
//            AdminColumn::lists('patternEdgeDecorsTwo.name','К-2')->setWidth('100px'),
//            AdminColumn::lists('patternEdgeDecorsThree.name','К-3')->setWidth('100px'),
//            AdminColumn::lists('patternEdgeDecorsFour.name','К-4')->setWidth('100px'),
            AdminColumn::relatedLink('blankType.name','Тип заг.'),
            AdminColumn::relatedLink('nip.name','Завал'),
//            AdminColumn::relatedLink('patternOptionSideOne.name','C-1')->setWidth('100px'),
//            AdminColumn::relatedLink('patternOptionSideTwo.name','C-2')->setWidth('100px'),
//            AdminColumn::relatedLink('patternOptionSideThree.name','C-3')->setWidth('100px'),
//            AdminColumn::relatedLink('patternOptionSideFour.name','C-4')->setWidth('100px'),
//            AdminColumn::relatedLink('patternOptionEdgeOne.name','У-1')->setWidth('100px'),
//            AdminColumn::relatedLink('patternOptionEdgeTwo.name','У-2')->setWidth('100px'),
//            AdminColumn::relatedLink('patternOptionEdgeThree.name','У-3')->setWidth('100px'),
//            AdminColumn::relatedLink('patternOptionEdgeFour.name','У-4')->setWidth('100px'),
        ]);
        $display->paginate(10);
        $display->setApply(function ($query){
            $query->orderBy('name', 'asc');
        });
        $display->setHtmlAttribute('class', 'table2');
        $display->setHtmlAttribute('class', 'text-center');
        return $display;
    });

    $model->onCreateAndEdit(function (){
        $form = AdminForm::panel()->addBody([
            AdminFormElement::text('name','Наименование')->required(),
            AdminFormElement::image('image','Изображение')->required(),
            AdminFormElement::select('thickness_id','Толщ.')->required()
                ->setModelForOptions(new \App\Thickness())
                ->setLoadOptionsQueryPreparer(function ($item,$query){
                    return $query->orderBy('name','asc');
                })
                ->setDisplay('name'),
            AdminFormElement::select('form_id','Тип конструкции')->required()
                ->setModelForOptions(new \App\Form())
                ->setLoadOptionsQueryPreparer(function ($item,$query){
                    return $query->orderBy('name','asc');
                })
                ->setDisplay('name'),
            AdminFormElement::multiselect('patternEdgeDecorsOne','Кромка 1')->required()
                ->setModelForOptions(new \App\EdgeCategory())
                ->setLoadOptionsQueryPreparer(function ($item,$query){
                    return $query->orderBy('name','asc');
                })
                ->setDisplay('name'),
            AdminFormElement::multiselect('patternEdgeDecorsTwo','Кромка 2')->required()
                ->setModelForOptions(new \App\EdgeCategory())
                ->setLoadOptionsQueryPreparer(function ($item,$query){
                    return $query->orderBy('name','asc');
                })
                ->setDisplay('name'),
            AdminFormElement::multiselect('patternEdgeDecorsThree','Кромка 3')->required()
                ->setModelForOptions(new \App\EdgeCategory())
                ->setLoadOptionsQueryPreparer(function ($item,$query){
                    return $query->orderBy('name','asc');
                })
                ->setDisplay('name'),
            AdminFormElement::multiselect('patternEdgeDecorsFour','Кромка 4')->required()
                ->setModelForOptions(new \App\EdgeCategory())
                ->setLoadOptionsQueryPreparer(function ($item,$query){
                    return $query->orderBy('name','asc');
                })
                ->setDisplay('name'),
            AdminFormElement::select('blank_type_id','Тип заг.')->required()
                ->setModelForOptions(new \App\BlankType())
                ->setLoadOptionsQueryPreparer(function ($item,$query){
                    return $query->orderBy('name','asc');
                })
                ->setDisplay('name'),
            AdminFormElement::select('nip_id','Завал')->required()
                ->setModelForOptions(new \App\Nip())
                ->setLoadOptionsQueryPreparer(function ($item,$query){
                    return $query->orderBy('name','asc');
                })
                ->setDisplay('name'),
            AdminFormElement::select('part_side_one','Сторона 1')->required()
                ->setModelForOptions(new \App\PatternOption())
                ->setLoadOptionsQueryPreparer(function ($item,$query){
                    return $query->orderBy('name','asc');
                })
                ->setDisplay('name'),
            AdminFormElement::select('part_side_two','Сторона 2')->required()
                ->setModelForOptions(new \App\PatternOption())
                ->setLoadOptionsQueryPreparer(function ($item,$query){
                    return $query->orderBy('name','asc');
                })
                ->setDisplay('name'),
            AdminFormElement::select('part_side_three','Сторона 3')->required()
                ->setModelForOptions(new \App\PatternOption())
                ->setLoadOptionsQueryPreparer(function ($item,$query){
                    return $query->orderBy('name','asc');
                })
                ->setDisplay('name'),
            AdminFormElement::select('part_side_four','Сторона 4')->required()
                ->setModelForOptions(new \App\PatternOption())
                ->setLoadOptionsQueryPreparer(function ($item,$query){
                    return $query->orderBy('name','asc');
                })
                ->setDisplay('name'),
            AdminFormElement::select('part_edge_one','Угол 1')->required()
                ->setModelForOptions(new \App\PatternOption())
                ->setLoadOptionsQueryPreparer(function ($item,$query){
                    return $query->orderBy('name','asc');
                })
                ->setDisplay('name'),
            AdminFormElement::select('part_edge_two','Угол 2')->required()
                ->setModelForOptions(new \App\PatternOption())
                ->setLoadOptionsQueryPreparer(function ($item,$query){
                    return $query->orderBy('name','asc');
                })
                ->setDisplay('name'),
            AdminFormElement::select('part_edge_three','Угол 3')->required()
                ->setModelForOptions(new \App\PatternOption())
                ->setLoadOptionsQueryPreparer(function ($item,$query){
                    return $query->orderBy('name','asc');
                })
                ->setDisplay('name'),
            AdminFormElement::select('part_edge_four','Угол 4')->required()
                ->setModelForOptions(new \App\PatternOption())
                ->setLoadOptionsQueryPreparer(function ($item,$query){
                    return $query->orderBy('name','asc');
                })
                ->setDisplay('name'),
        ]);

        return $form;
    });
});
