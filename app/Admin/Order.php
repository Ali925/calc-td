<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Order;
use App\ReadyProduct;


AdminSection::registerModel(Order::class, function (ModelConfiguration $model){
    $model->setTitle('Заказы');

    $model->onDisplay(function (){
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::text('order_num','№ заказа'),
            AdminColumn::relatedLink('customer.first_name','Заказчик'),
            AdminColumn::text('order_amount','Стоимость'),
        ]);
        $display->paginate(10);
        return $display;
    });

    $model->onEdit(function ($id = null){
        $display = AdminDisplay::tabbed();
        $display->setTabs(function () use ($id){
            $tabs =[];
            $form = AdminForm::panel();

            $form->addBody([
                AdminFormElement::text('order_num','№ заказа')->setReadonly(true),
                AdminFormElement::text('order_amount','Стоимость')->setReadonly(true),
                AdminFormElement::select('customer_id','Заказчик')->setReadonly(true)
                    ->setModelForOptions(\App\Customer::class)->setDisplay('first_name'),
            ]);
            $form
                ->getButtons()
                ->setCancelButtonText('Close')
                ->hideDeleteButton()
                ->hideSaveAndCloseButton()
                ->hideSaveAndCreateButton();


            $tabs[] = AdminDisplay::tab($form)->setLabel('Main Form')->setActive(true);

            $ready = AdminSection::getModel(ReadyProduct::class)->fireDisplay();
            $ready->getScopes()->push(['withOrder', $id]);
            $ready->setParameter('order_id', $id);

            $tabs[] = AdminDisplay::tab($ready)->setLabel('Products');

            return $tabs;
        });

        return $display;
    });
})->addMenuPage(Order::class, 0)
    ->setIcon('fa fa-bank');