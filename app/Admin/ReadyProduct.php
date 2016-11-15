<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\ReadyProduct;

AdminSection::registerModel(ReadyProduct::class, function (ModelConfiguration $model){
    $model->setTitle('Test');

    $model->onDisplay(function (){
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::relatedLink('form.name','Тип конструкции'),
            AdminColumn::relatedLink('blankType.name','Тип заготовки'),
            AdminColumn::relatedLink('decorCategory.name','Категория декора'),
            AdminColumn::relatedLink('decor.name','Декор'),
            AdminColumn::relatedLink('nip.name','Завал'),
            AdminColumn::text('width','Ширина'),
            AdminColumn::text('length','Длинна'),
            AdminColumn::relatedLink('thickness.name','Толшина'),
            AdminColumn::relatedLink('euro.name','Еврозапил'),
            AdminColumn::relatedLink('bevel.name','Скос'),
            AdminColumn::relatedLink('standard.name','Стандартное соеденение'),
            AdminColumn::relatedLink('radius.name','Радиус'),
            AdminColumn::relatedLink('edgeOne.name','Кромка 1'),
            AdminColumn::relatedLink('edgeTwo.name','Кромка 2'),
            AdminColumn::relatedLink('edgeThree.name','Кромка 3'),
            AdminColumn::relatedLink('edgeFour.name','Кромка 4'),
            AdminColumn::relatedLink('patternAccordance.image','Чертеж'),
            AdminColumn::relatedLink('wrapper.coast','Упаковка'),

        ]);
        $display->paginate(10);
        $display->setHtmlAttribute('class', 'table2');
        return $display;
    });
})->addMenuPage(ReadyProduct::class, 0)
    ->setIcon('fa fa-bank');