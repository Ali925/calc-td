<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\PatternAccordance;

AdminSection::registerModel(PatternAccordance::class, function (ModelConfiguration $model){
    $model->setTitle('Опции чертежа');
    if (url()->current() == url('admin/pattern_accordances'))
        Assets::addCss('admin-table',asset('css/adminTables.css'));

    $model->onDisplay(function (){
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::text('name','Наим.')->setWidth('100px'),
            AdminColumn::image('image','Изобр.')->setWidth('300px'),
            AdminColumn::relatedLink('thickness.value','Толщ.')->setWidth('100px'),
            AdminColumn::lists('edge_one','К-1')->setWidth('100px'),
            AdminColumn::lists('edge_two','К-2')->setWidth('100px'),
            AdminColumn::lists('edge_three','К-3')->setWidth('100px'),
            AdminColumn::lists('edge_four','К-4')->setWidth('100px'),
            AdminColumn::relatedLink('blankType.name','Тип заг.')->setWidth('200px'),
            AdminColumn::relatedLink('nip.name','Завал')->setWidth('200px'),
            AdminColumn::relatedLink('patternOptionSideOne.name','C-1')->setWidth('100px'),
            AdminColumn::relatedLink('patternOptionSideTwo.name','C-2')->setWidth('100px'),
            AdminColumn::relatedLink('patternOptionSideThree.name','C-3')->setWidth('100px'),
            AdminColumn::relatedLink('patternOptionSideFour.name','C-4')->setWidth('100px'),
            AdminColumn::relatedLink('patternOptionEdgeOne.name','У-1')->setWidth('100px'),
            AdminColumn::relatedLink('patternOptionEdgeTwo.name','У-2')->setWidth('100px'),
            AdminColumn::relatedLink('patternOptionEdgeThree.name','У-3')->setWidth('100px'),
            AdminColumn::relatedLink('patternOptionEdgeFour.name','У-4')->setWidth('100px'),
        ]);
        $display->paginate(10);
        $display->setHtmlAttribute('class', 'table2');
        return $display;
    });

    $model->onCreateAndEdit(function (){
        $form = AdminForm::panel()->addBody([
            AdminFormElement::text('name','Наименование'),
            AdminFormElement::image('image','Изображение'),
            AdminFormElement::select('thickness_id','Толщ.')
                ->setOptions(\App\Thickness::getList()),
            AdminFormElement::multiselect('edge_one','Кромка 1')->setOptions(\App\EdgeCategory::getList()),
            AdminFormElement::multiselect('edge_two','Кромка 2')->setOptions(\App\EdgeCategory::getList()),
            AdminFormElement::multiselect('edge_three','Кромка 3')->setOptions(\App\EdgeCategory::getList()),
            AdminFormElement::multiselect('edge_four','Кромка 4')->setOptions(\App\EdgeCategory::getList()),
            AdminFormElement::select('blank_type_id','Тип заг.')->setOptions(\App\BlankType::getList()),
            AdminFormElement::select('nip_id','Завал')->setOptions(\App\Nip::getList()),
            AdminFormElement::select('part_side_one','Сторона 1')->setOptions(\App\PatternOption::getList()),
            AdminFormElement::select('part_side_two','Сторона 2')->setOptions(\App\PatternOption::getList()),
            AdminFormElement::select('part_side_three','Сторона 3')->setOptions(\App\PatternOption::getList()),
            AdminFormElement::select('part_side_four','Сторона 4')->setOptions(\App\PatternOption::getList()),
            AdminFormElement::select('part_edge_one','Угол 1')->setOptions(\App\PatternOption::getList()),
            AdminFormElement::select('part_edge_two','Угол 2')->setOptions(\App\PatternOption::getList()),
            AdminFormElement::select('part_edge_three','Угол 3')->setOptions(\App\PatternOption::getList()),
            AdminFormElement::select('part_edge_four','Угол 4')->setOptions(\App\PatternOption::getList()),
        ]);

        return $form;
    });
});
