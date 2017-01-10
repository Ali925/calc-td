<?php

use SleepingOwl\Admin\Navigation\Page;

return [
    [
        (new Page(\App\Order::class))
            ->setTitle('Заказы')
            ->setIcon('fa fa-file-photo-o')
            ->setPriority(0),
    ],
    [
        'title' => 'Декоры',
        'priority' => 1,
        'icon' => 'fa fa-folder-open',
        'accessLogic' => function(){return auth()->user()->isAdmin();},
        'pages' => [
            [
                'title' => 'Изделия',
                'priority' => 1,
                'pages' => [
                    (new Page(\App\Decor::class))
                        ->setTitle('Декоры')
                        ->setIcon('fa fa-file-photo-o')
                        ->setPriority(20),
                    (new Page(\App\DecorCategory::class))
                        ->setTitle('Категории')
                        ->setIcon('fa fa-folder-open-o')
                        ->setPriority(10),
                ],
            ],
            [
                'title' => 'Кромки',
                'priority' => 1,
                'pages' => [
                    (new Page(\App\EdgeCategory::class))
                        ->setTitle('Категории')
                        ->setIcon('fa fa-folder-open-o')
                        ->setPriority(30),
                    (new Page(\App\EdgeDecor::class))
                        ->setTitle('Декоры')
                        ->setIcon('fa fa-file-photo-o')
                        ->setPriority(40),
                ],
            ],

        ]
    ],
    [
        'title' => 'Заготовки и констр.',
        'priority' => 2,
        'icon' => 'fa fa-folder-open',
        'accessLogic' => function(){return auth()->user()->isAdmin();},
        'pages' => [
            (new Page(\App\Product::class))
                ->setTitle('Заготовки')
                ->setIcon('fa fa-cubes')
                ->setPriority(10),
            (new Page(\App\BlankType::class))
                ->setTitle('Тип заготовки')
                ->setIcon('fa fa-cubes')
                ->setPriority(10),
            (new Page(\App\Form::class))
                ->setTitle('Тип конструкции')
                ->setIcon('fa fa-cubes')
                ->setPriority(20),
            (new Page(\App\Nip::class))
                ->setTitle('Завалы')
                ->setIcon('fa fa-cubes')
                ->setPriority(30),
            (new Page(\App\Thickness::class))
                ->setTitle('Толщины')
                ->setIcon('fa fa-cubes')
                ->setPriority(40),
            (new Page(\App\Wrapper::class))
                ->setTitle('Упаковка')
                ->setIcon('fa fa-cubes')
                ->setPriority(50),
        ]

    ],
    [
        'title' => 'Настройки чертежа',
        'priority' => 3,
        'icon' => 'fa fa-folder-open',
        'accessLogic' => function(){return auth()->user()->isAdmin();},
        'pages' => [
            [
                'title' => 'Экран калькулятора',
                'pages' => [
                    (new Page(\App\PatternOption::class))
                        ->setTitle('Опции чертежа')
                        ->setIcon('fa fa-cubes')
                        ->setPriority(40),
                    (new Page(\App\PatternPosition::class))
                        ->setTitle('Позиции чертежа')
                        ->setIcon('fa fa-cubes')
                        ->setPriority(40),
                ],
            ],
            (new Page(\App\PatternAccordance::class))
                ->setTitle('Соответствие чертежей')
                ->setIcon('fa fa-cubes')
                ->setPriority(40),
        ],
    ],
    [
        'title' => 'Information',
        'icon'  => 'fa fa-exclamation-circle',
        'pages' => [
            (new Page())
                ->setTitle('Секция "Заказы"')
                ->setIcon('fa fa-exclamation-circle')
                ->setUrl(route('docs.orders')),
            (new Page())
                ->setTitle('Секция "Пользователи"')
                ->setIcon('fa fa-exclamation-circle')
                ->setUrl(route('docs.users')),
            (new Page())
                ->setTitle('Секция "Декоры"')
                ->setIcon('fa fa-exclamation-circle')
                ->setUrl(route('docs.decors')),
        ],
    ],
];