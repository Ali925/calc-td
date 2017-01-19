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
            AdminColumn::image('pattern_image','Чертеж'),
            AdminColumn::lists('blankTypes.name','Типы заготовок'),
        ]);
        $display->setApply(function ($query){
            $query->orderBy('name', 'asc');
        });
        $display->paginate(10);
        return $display;
    });

    $model->onCreateAndEdit(function (){
        $form = AdminForm::panel()->addBody([
            AdminFormElement::text('name','Наименование'),
            AdminFormElement::text('coast','Цена'),
            AdminFormElement::image('image','Изображение'),
            AdminFormElement::image('pattern_image','Чертеж'),
            AdminFormElement::multiselect('blankTypes', 'Продукт')
                ->setModelForOptions(new \App\BlankType())
                ->setLoadOptionsQueryPreparer(function ($item,$query){
                    return $query->orderBy('name','asc');
                })
                ->setDisplay('name'),
            AdminFormElement::multiselect('nip', 'Завал')
                ->setModelForOptions(new \App\Nip())
                ->setLoadOptionsQueryPreparer(function ($item,$query){
                    return $query->orderBy('name','asc');
                })
                ->setDisplay('name')->required(),
            AdminFormElement::multiselect('option_edge_1', 'Угол 1')
                ->setModelForOptions(new \App\PatternOption())
                ->setLoadOptionsQueryPreparer(function ($item,$query){
                    return $query->orderBy('name','asc');
                })
                ->setDisplay('name'),
            AdminFormElement::multiselect('option_edge_2', 'Угол 2')
                ->setModelForOptions(new \App\PatternOption())
                ->setLoadOptionsQueryPreparer(function ($item,$query){
                    return $query->orderBy('name','asc');
                })
                ->setDisplay('name'),
            AdminFormElement::multiselect('option_edge_3', 'Угол 3')
                ->setModelForOptions(new \App\PatternOption())
                ->setLoadOptionsQueryPreparer(function ($item,$query){
                    return $query->orderBy('name','asc');
                })
                ->setDisplay('name'),
            AdminFormElement::multiselect('option_edge_4', 'Угол 4')
                ->setModelForOptions(new \App\PatternOption())
                ->setLoadOptionsQueryPreparer(function ($item,$query){
                    return $query->orderBy('name','asc');
                })
                ->setDisplay('name'),
            AdminFormElement::multiselect('option_side_1', 'Сторона 1')
                ->setModelForOptions(new \App\PatternOption())
                ->setLoadOptionsQueryPreparer(function ($item,$query){
                    return $query->orderBy('name','asc');
                })
                ->setDisplay('name'),
            AdminFormElement::multiselect('option_side_2', 'Сторона 2')
                ->setModelForOptions(new \App\PatternOption())
                ->setLoadOptionsQueryPreparer(function ($item,$query){
                    return $query->orderBy('name','asc');
                })
                ->setDisplay('name'),
            AdminFormElement::multiselect('option_side_3', 'Сторона 3')
                ->setModelForOptions(new \App\PatternOption())
                ->setLoadOptionsQueryPreparer(function ($item,$query){
                    return $query->orderBy('name','asc');
                })
                ->setDisplay('name'),
            AdminFormElement::multiselect('option_side_4', 'Сторона 4')
                ->setModelForOptions(new \App\PatternOption())
                ->setLoadOptionsQueryPreparer(function ($item,$query){
                    return $query->orderBy('name','asc');
                })
                ->setDisplay('name'),
            AdminFormElement::select('access_one_side', 'Кромка 1')
                ->setOptions(['0' => 'Доступно для выбора', '1' => 'Копировать кромку 1',
                    '2' => 'Копировать кромку 2','3' => 'Копировать кромку 3','4' => 'Копировать кромку 4'])->required(),
            AdminFormElement::select('access_two_side', 'Кромка 2')
                ->setOptions(['0' => 'Доступно для выбора', '1' => 'Копировать кромку 1',
                    '2' => 'Копировать кромку 2','3' => 'Копировать кромку 3','4' => 'Копировать кромку 4'])->required(),
            AdminFormElement::select('access_three_side', 'Кромка 3')
                ->setOptions(['0' => 'Доступно для выбора', '1' => 'Копировать кромку 1',
                    '2' => 'Копировать кромку 2','3' => 'Копировать кромку 3','4' => 'Копировать кромку 4'])->required(),
            AdminFormElement::select('access_four_side', 'Кромка 4')
                ->setOptions(['0' => 'Доступно для выбора', '1' => 'Копировать кромку 1',
                    '2' => 'Копировать кромку 2','3' => 'Копировать кромку 3','4' => 'Копировать кромку 4'])->required(),
        ]);

        return $form;
    });
});