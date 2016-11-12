<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\PatternAccordance;

AdminSection::registerModel(PatternAccordance::class, function (ModelConfiguration $model){
    $model->setTitle('Опции чертежа');

    $model->onDisplay(function (){
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::text('name','Наим.'),
            AdminColumn::image('image','Изобр.'),
            AdminColumn::relatedLink('thickness.value','Толщ.'),
            AdminColumn::lists('edge_one','К-1'),
            AdminColumn::lists('edge_two','К-2'),
            AdminColumn::lists('edge_three','К-3'),
            AdminColumn::lists('edge_four','К-4'),
            AdminColumn::relatedLink('blankType.name','Тип заг.'),
            AdminColumn::relatedLink('nip.name','Завал'),
            AdminColumn::lists('part_side_one','C-1'),
            AdminColumn::lists('part_side_two','C-2'),
            AdminColumn::lists('part_side_three','C-3'),
            AdminColumn::lists('part_side_four','C-4'),
            AdminColumn::lists('part_edge_one','У-1'),
            AdminColumn::lists('part_edge_two','У-2'),
            AdminColumn::lists('part_edge_three','У-3'),
            AdminColumn::lists('part_edge_four','У-4'),
        ]);
        $display->paginate(10);
        return $display;
    });

    $model->onCreate(function (){
        $form = AdminForm::panel()->addBody([
            AdminFormElement::text('name','Наименование'),
            AdminFormElement::image('image','Изображение'),
            AdminFormElement::select('thickness_id','Толщ.', \App\Thickness::getList()),
            AdminFormElement::multiselect('edge_one','Кромка 1', \App\EdgeCategory::getList()),
            AdminFormElement::multiselect('edge_two','Кромка 2', \App\EdgeCategory::getList()),
            AdminFormElement::multiselect('edge_three','Кромка 3', \App\EdgeCategory::getList()),
            AdminFormElement::multiselect('edge_four','Кромка 4',\App\EdgeCategory::getList()),
            AdminFormElement::select('blank_type_id','Тип заг.', \App\BlankType::getList()),
            AdminFormElement::select('nip_id','Завал', \App\Nip::getList()),
            AdminFormElement::multiselect('part_side_one','Сторона 1', \App\PatternOption::getList()),
            AdminFormElement::multiselect('part_side_two','Сторона 2',\App\PatternOption::getList()),
            AdminFormElement::multiselect('part_side_three','Сторона 3',\App\PatternOption::getList()),
            AdminFormElement::multiselect('part_side_four','Сторона 4',\App\PatternOption::getList()),
            AdminFormElement::multiselect('part_edge_one','Угол 1',\App\PatternOption::getList()),
            AdminFormElement::multiselect('part_edge_two','Угол 2',\App\PatternOption::getList()),
            AdminFormElement::multiselect('part_edge_three','Угол 3',\App\PatternOption::getList()),
            AdminFormElement::multiselect('part_edge_four','Угол 4',\App\PatternOption::getList()),
        ]);

        return $form;
    });
});
