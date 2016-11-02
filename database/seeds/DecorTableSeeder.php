<?php

use Illuminate\Database\Seeder;

class DecorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('decors')->truncate();
        $decors = [
            [ 'name' => 'Аристоун', 'code' => '422Г', 'image' => 'images/uploads/422G.jpg',
                'decor_category_id' => 2
            ],
            [ 'name' => 'Брилиант белый', 'code' => '400К', 'image' => 'images/uploads/400K.jpg',
                'decor_category_id' => 2
            ],
            [ 'name' => 'Эверест', 'code' => '417Г', 'image' => 'images/uploads/417G.jpg',
                'decor_category_id' => 2
            ],
            [ 'name' => 'Кашемир белый', 'code' => '414Т', 'image' => 'images/uploads/414Т.jpg',
                'decor_category_id' => 2
            ],
            [ 'name' => 'Антарес', 'code' => '415Г', 'image' => 'images/uploads/415G.jpg',
                'decor_category_id' => 2 ],
            [ 'name' => 'Брилиант фантазийный', 'code' => '402К', 'image' => 'images/uploads/402K.jpg',
                'decor_category_id' => 2
            ],
            [ 'name' => 'Брилиант черный', 'code' => '401К', 'image' => 'images/uploads/401K.jpg',
                'decor_category_id' => 2
            ],
            [ 'name' => 'Античный маскарелло', 'code' => '412М', 'image' => 'images/uploads/412M.jpg',
                'decor_category_id' => 1
            ],
            [ 'name' => 'Бежевый маскарелло', 'code' => '426К', 'image' => 'images/uploads/426K.jpg',
                'decor_category_id' => 1
            ],
            [ 'name' => 'Лино бьянко', 'code' => '229М', 'image' => 'images/uploads/229M.jpg',
                'decor_category_id' => 2
            ],
            [ 'name' => 'Дуб ниагара', 'code' => '230М', 'image' => 'images/uploads/230M.jpg',
                'decor_category_id' => 2
            ],
            [ 'name' => 'Сепия', 'code' => '241М', 'image' => 'images/uploads/241M.jpg',
                'decor_category_id' => 2
            ],
            [ 'name' => 'Терра', 'code' => '244М', 'image' => 'images/uploads/244M.jpg',
                'decor_category_id' => 2
            ],
            [ 'name' => 'Голубой минерал', 'code' => '246М', 'image' => 'images/uploads/246M.jpg',
                'decor_category_id' => 2
            ],
            [ 'name' => 'Артстоун бежевый', 'code' => '248М', 'image' => 'images/uploads/248M.jpg',
                'decor_category_id' => 2
            ],
            [ 'name' => 'Орион', 'code' => '436Г', 'image' => 'images/uploads/436G.jpg',
                'decor_category_id' => 1
            ],
            [ 'name' => 'Лазурный шторм', 'code' => '411М', 'image' => 'images/uploads/411M.jpg',
                'decor_category_id' => 1
            ],
            [ 'name' => 'Бетон', 'code' => '425Т', 'image' => 'images/uploads/425Т.jpg',
                'decor_category_id' => 1
            ],
            [ 'name' => 'Песчаная яшма', 'code' => '437Г', 'image' => 'images/uploads/437G.jpg',
                'decor_category_id' => 2
            ],
            [ 'name' => 'Оникс серебристый', 'code' => '424Т', 'image' => 'images/uploads/424Т.jpg',
                'decor_category_id' => 1
            ],
            [ 'name' => 'Кристалл', 'code' => '423Т', 'image' => 'images/uploads/423Т.jpg',
                'decor_category_id' => 1
            ],
            [ 'name' => 'Альмандин', 'code' => '139М', 'image' => 'images/uploads/139M.jpg',
                'decor_category_id' => 4
            ],
            [ 'name' => 'Хальцедон', 'code' => '136М', 'image' => 'images/uploads/136M.jpg',
                'decor_category_id' => 4
            ],
            [ 'name' => 'Оникс бежевый', 'code' => '100М', 'image' => 'images/uploads/100M.jpg',
                'decor_category_id' => 4
            ],
            [ 'name' => 'Уника снежная', 'code' => '206К', 'image' => 'images/uploads/206К.jpg',
                'decor_category_id' => 4
            ],
            [ 'name' => 'Белый дуб', 'code' => '154М', 'image' => 'images/uploads/154M.jpg',
                'decor_category_id' => 4
            ],
            [ 'name' => 'Сахара', 'code' => '30М', 'image' => 'images/uploads/30M.jpg',
                'decor_category_id' => 4
            ],
            [ 'name' => 'Тростник', 'code' => '134М', 'image' => 'images/uploads/134M.jpg',
                'decor_category_id' => 3
            ],
            [ 'name' => 'Дуглас светлый', 'code' => '133М', 'image' => 'images/uploads/133M.jpg',
                'decor_category_id' => 3
            ],
            [ 'name' => 'Оникс', 'code' => '105М', 'image' => 'images/uploads/105G.jpg',
                'decor_category_id' => 3
            ],
            [ 'name' => 'Дуглас темный', 'code' => '135М', 'image' => 'images/uploads/135M.jpg',
                'decor_category_id' => 3
            ],
        ];

        foreach ($decors as $decor){
            \App\Decor::create([
                'name' => $decor['name'],
                'code' => $decor['code'],
                'image' => $decor['image'],
                'decor_category_id' => $decor['decor_category_id'],
            ]);

        }
    }
}
