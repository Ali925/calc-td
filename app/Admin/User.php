<?php
use SleepingOwl\Admin\Model\ModelConfiguration;
use App\User;
use Illuminate\Database\Eloquent\Model;

AdminSection::registerModel(User::class, function (ModelConfiguration $model){
    $model->setTitle('Пользователи');

    $model->onDisplay(function (){
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::text('name','Name'),
            AdminColumn::text('email','Email'),
            AdminColumn::custom('Role',function (Model $model){
                return $model->RoleName();
            }),
        ]);
        //$display->paginate(10);
        return $display;
    });

    $model->onCreateAndEdit(function (){
        $form = AdminForm::panel()->addBody([
                AdminFormElement::text('name', 'Name')->required()->unique(),
                AdminFormElement::text('email', 'Email')->required()->unique(),
                AdminFormElement::password('password', 'Password')->required(),
                AdminFormElement::select('role','Role',[ 1 => 'Administrator', 2 => 'Manager'])
        ]);

        return $form;
    });
})->addMenuPage(User::class, 1)->setIcon('fa fa-users');