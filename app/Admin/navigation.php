<?php

use SleepingOwl\Admin\Navigation\Page;

return [
    [
        'title' => 'Dashboard',
        'icon'  => 'fa fa-dashboard',
        'url'   => route('admin.dashboard'),
        'priority' => 0
    ],

    [
        'title' => 'Information',
        'icon'  => 'fa fa-exclamation-circle',
        'url'   => route('admin.information'),
    ],

    [
        'title' => 'Декоры',
        'priority' => 1,
        'icon' => 'fa fa-folder-open',
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
        ]

    ],
    [
        'title' => 'Настройки чертежа',
        'priority' => 3,
        'icon' => 'fa fa-folder-open',
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
            ]
        ],
    ],
];