<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatternOptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pattern_options')->truncate();

        $options = [
            [
                'name' => 'Еврозапил (верх)',
                'image' => '',
                'coast' => 1400,
                'description' => ' -  Соединение двух столешниц/деталей под прямым углом посредством 
                                  металлических стяжек с предварительным «встречным» запилом заготовок',
            ],
            [
                'name' => 'Еврозапил (низ)',
                'image' => '',
                'coast' => 1400,
                'description' => ' -  Соединение двух столешниц/деталей под прямым углом посредством 
                                  металлических стяжек с предварительным «встречным» запилом заготовок',
            ],
            [
                'name' => 'Стандартное соединение (верх)',
                'image' => '',
                'coast' => 300,
                'description' => ' -  Продольное соединение деталей с помощью металлических
                                  стяжек и плоских шкантов.',
            ],
            [
                'name' => 'Стандартное соединение (низ)',
                'image' => '',
                'coast' => 300,
                'description' => ' -  Продольное соединение деталей с помощью металлических
                                  стяжек и плоских шкантов.',
            ],
            [
                'name' => 'Нет',
                'image' => '',
                'coast' => 0,
                'description' => '',
            ],
            [
                'name' => 'Радиус внешний',
                'image' => '',
                'coast' => 500,
                'description' => ' -  Внешнее/внутреннее закругление угла столешницы/детали.',
            ],
            [
                'name' => 'Радиус внутренний',
                'image' => '',
                'coast' => 500,
                'description' => ' -  Внешнее/внутреннее закругление угла столешницы/детали.',
            ],
            [
                'name' => 'Скос',
                'image' => '',
                'coast' => 300,
                'description' => ' -  диагональный срез угла столешницы/детали',
            ],
            [
                'name' => 'Еврозапил',
                'image' => '',
                'coast' => 1400,
                'description' => ' -  Соединение двух столешниц/деталей под прямым углом посредством 
                                  металлических стяжек с предварительным «встречным» запилом заготовок',
            ],
            [
                'name' => 'Стандартное соединение',
                'image' => '',
                'coast' => 300,
                'description' => ' -  Продольное соединение деталей с помощью металлических
                                  стяжек и плоских шкантов.',
            ],
        ];

        foreach ($options as $option){
            \App\PatternOption::create([
                'name' => $option['name'],
                'image' => $option['image'],
                'coast' => $option['coast'],
                'description' => $option['description'],
            ]);
        }
    }
}
