<?php

use SleepingOwl\Admin\Navigation\Page;

// Default check access logic
// AdminNavigation::setAccessLogic(function(Page $page) {
// 	   return auth()->user()->isSuperAdmin();
// });
//
// AdminNavigation::addPage(\App\User::class)->setTitle('test')->setPages(function(Page $page) {
// 	  $page
//		  ->addPage()
//	  	  ->setTitle('Dashboard')
//		  ->setUrl(route('admin.dashboard'))
//		  ->setPriority(100);
//
//	  $page->addPage(\App\User::class);
// });
//
// // or
//
// AdminSection::addMenuPage(\App\User::class)

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
        'icon' => 'fa fa-cube',
        'pages' => [
            (new Page(\App\Product::class))
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
        'icon' => 'fa fa-file-o',
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

    // Examples
    // [
    //    'title' => 'Content',
    //    'pages' => [
    //
    //        \App\User::class,
    //
    //        // or
    //
    //        (new Page(\App\User::class))
    //            ->setPriority(100)
    //            ->setIcon('fa fa-user')
    //            ->setUrl('users')
    //            ->setAccessLogic(function (Page $page) {
    //                return auth()->user()->isSuperAdmin();
    //            }),
    //
    //        // or
    //
    //        new Page([
    //            'title'    => 'News',
    //            'priority' => 200,
    //            'model'    => \App\News::class
    //        ]),
    //
    //        // or
    //        (new Page(/* ... */))->setPages(function (Page $page) {
    //            $page->addPage([
    //                'title'    => 'Blog',
    //                'priority' => 100,
    //                'model'    => \App\Blog::class
	//		      ));
    //
	//		      $page->addPage(\App\Blog::class);
    //	      }),
    //
    //        // or
    //
    //        [
    //            'title'       => 'News',
    //            'priority'    => 300,
    //            'accessLogic' => function ($page) {
    //                return $page->isActive();
    //		      },
    //            'pages'       => [
    //
    //                // ...
    //
    //            ]
    //        ]
    //    ]
    // ]
];