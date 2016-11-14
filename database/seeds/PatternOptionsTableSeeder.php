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
        DB::table('pattern_option_pattern_position')->truncate();

        $options = [
            [
                'name' => 'Еврозапил (слева)',
                'image' => '',
                'coast' => 1400,
                'description' => ' -  Соединение двух столешниц/деталей под прямым углом посредством 
                                  металлических стяжек с предварительным «встречным» запилом заготовок',
                'kind' => 'eurozap',
            ],
            [
                'name' => 'Еврозапил (справа)',
                'image' => '',
                'coast' => 1400,
                'description' => ' -  Соединение двух столешниц/деталей под прямым углом посредством 
                                  металлических стяжек с предварительным «встречным» запилом заготовок',
                'kind' => 'eurozap',
            ],
            [
                'name' => 'Еврозапил (Двух стронний)',
                'image' => '',
                'coast' => 1400,
                'description' => ' -  Соединение двух столешниц/деталей под прямым углом посредством 
                                  металлических стяжек с предварительным «встречным» запилом заготовок',
                'kind' => 'eurozap',
            ],
            [
                'name' => 'Стандартное соединение (слева)',
                'image' => '',
                'coast' => 300,
                'description' => ' -  Продольное соединение деталей с помощью металлических
                                  стяжек и плоских шкантов.',
                'kind' => 'soed',
            ],
            [
                'name' => 'Стандартное соединение (справа)',
                'image' => '',
                'coast' => 300,
                'description' => ' -  Продольное соединение деталей с помощью металлических
                                  стяжек и плоских шкантов.',
                'kind' => 'soed',
            ],
            [
                'name' => 'Стандартное соединение (Двух стронний)',
                'image' => '',
                'coast' => 300,
                'description' => ' -  Продольное соединение деталей с помощью металлических
                                  стяжек и плоских шкантов.',
                'kind' => 'soed',
            ],
            [
                'name' => 'Нет',
                'image' => '',
                'coast' => 0,
                'description' => '',
                'kind' => 'none',
            ],
            [
                'name' => 'Радиус внешний',
                'image' => '',
                'coast' => 500,
                'description' => ' -  Внешнее/внутреннее закругление угла столешницы/детали.',
                'kind' => 'radius',
            ],
            [
                'name' => 'Радиус внутренний',
                'image' => '',
                'coast' => 500,
                'description' => ' -  Внешнее/внутреннее закругление угла столешницы/детали.',
                'kind' => 'radius',
            ],
            [
                'name' => 'Скос',
                'image' => '',
                'coast' => 300,
                'description' => ' -  диагональный срез угла столешницы/детали',
                'kind' => 'skos',
            ],
            [
                'name' => 'Еврозапил',
                'image' => '',
                'coast' => 1400,
                'description' => ' -  Соединение двух столешниц/деталей под прямым углом посредством 
                                  металлических стяжек с предварительным «встречным» запилом заготовок',
                'kind' => 'eurozap',
            ],
            [
                'name' => 'Стандартное соединение',
                'image' => '',
                'coast' => 300,
                'description' => ' -  Продольное соединение деталей с помощью металлических
                                  стяжек и плоских шкантов.',
                'kind' => 'soed',
            ],
        ];

        $pivots = [
            //side - 1
            ['pattern_option_id' => 7, 'pattern_position_id' => 1, ],
            ['pattern_option_id' => 1, 'pattern_position_id' => 1, ],
            ['pattern_option_id' => 2, 'pattern_position_id' => 1, ],
            ['pattern_option_id' => 3, 'pattern_position_id' => 1, ],
            ['pattern_option_id' => 4, 'pattern_position_id' => 1, ],
            ['pattern_option_id' => 5, 'pattern_position_id' => 1, ],
            ['pattern_option_id' => 6, 'pattern_position_id' => 1, ],

            //angle - 1
            ['pattern_option_id' => 7, 'pattern_position_id' => 2, ],
            ['pattern_option_id' => 8, 'pattern_position_id' => 2, ],
            ['pattern_option_id' => 9, 'pattern_position_id' => 2, ],
            ['pattern_option_id' => 10, 'pattern_position_id' => 2, ],

            //side - 2
            ['pattern_option_id' => 7, 'pattern_position_id' => 3, ],
            ['pattern_option_id' => 1, 'pattern_position_id' => 3, ],
            ['pattern_option_id' => 2, 'pattern_position_id' => 3, ],
            ['pattern_option_id' => 3, 'pattern_position_id' => 3, ],
            ['pattern_option_id' => 4, 'pattern_position_id' => 3, ],
            ['pattern_option_id' => 5, 'pattern_position_id' => 3, ],
            ['pattern_option_id' => 6, 'pattern_position_id' => 3, ],

            //angle - 2
            ['pattern_option_id' => 7, 'pattern_position_id' => 4, ],
            ['pattern_option_id' => 8, 'pattern_position_id' => 4, ],
            ['pattern_option_id' => 9, 'pattern_position_id' => 4, ],
            ['pattern_option_id' => 10, 'pattern_position_id' => 4, ],

            //side - 3
            ['pattern_option_id' => 7, 'pattern_position_id' => 5, ],
            ['pattern_option_id' => 1, 'pattern_position_id' => 5, ],
            ['pattern_option_id' => 2, 'pattern_position_id' => 5, ],
            ['pattern_option_id' => 3, 'pattern_position_id' => 5, ],
            ['pattern_option_id' => 4, 'pattern_position_id' => 5, ],
            ['pattern_option_id' => 5, 'pattern_position_id' => 5, ],
            ['pattern_option_id' => 6, 'pattern_position_id' => 5, ],

            //angle - 3
            ['pattern_option_id' => 7, 'pattern_position_id' => 6, ],
            ['pattern_option_id' => 8, 'pattern_position_id' => 6, ],
            ['pattern_option_id' => 9, 'pattern_position_id' => 6, ],
            ['pattern_option_id' => 10, 'pattern_position_id' => 6, ],

            //side - 4
            ['pattern_option_id' => 7, 'pattern_position_id' => 7, ],
            ['pattern_option_id' => 1, 'pattern_position_id' => 7, ],
            ['pattern_option_id' => 2, 'pattern_position_id' => 7, ],
            ['pattern_option_id' => 3, 'pattern_position_id' => 7, ],
            ['pattern_option_id' => 4, 'pattern_position_id' => 7, ],
            ['pattern_option_id' => 5, 'pattern_position_id' => 7, ],
            ['pattern_option_id' => 6, 'pattern_position_id' => 7, ],

            //angle - 4
            ['pattern_option_id' => 7, 'pattern_position_id' => 8, ],
            ['pattern_option_id' => 8, 'pattern_position_id' => 8, ],
            ['pattern_option_id' => 9, 'pattern_position_id' => 8, ],
            ['pattern_option_id' => 10, 'pattern_position_id' => 8, ],
        ];

        foreach ($options as $option){
            \App\PatternOption::create([
                'name' => $option['name'],
                'image' => $option['image'],
                'coast' => $option['coast'],
                'description' => $option['description'],
                'kind' => $option['kind'],
            ]);
        }

        foreach ($pivots as $pivot){
            DB::table('pattern_option_pattern_position')->insert([
                'pattern_option_id' => $pivot['pattern_option_id'],
                'pattern_position_id' => $pivot['pattern_position_id'],
            ]);
        }
    }
}
