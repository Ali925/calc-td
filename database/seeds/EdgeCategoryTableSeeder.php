<?php

use Illuminate\Database\Seeder;

class EdgeCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('edge_categories')->truncate();
        DB::table('edge_decors')->truncate();


        $categories = [
            [
                'name' => 'Кромка техническая',
                'coast' => 100,
                'egoist' => 0
            ],
            [
                'name' => 'Кромка в цвет',
                'coast' => 300,
                'egoist' => 1
            ],
            [
                'name' => 'Кромка АБС',
                'coast' => 400,
                'egoist' => 1
            ],
            [
                'name' => 'Кромка 3D',
                'coast' => 400,
                'egoist' => 1
            ],
            [
                'name' => 'Без кромки',
                'coast' => 0,
                'egoist' => 0
            ],
            [
                'name' => 'Завал',
                'coast' => 0,
                'egoist' => 0
            ],
        ];

        $decors = [
            [
                'name' => 'У вас выбран завал', 'code' => 'zaval', 'image' => 'images/uploads/none.png',
                'edge_category_id' => 5
            ],
            [
                'name' => 'Нет', 'code' => 'none', 'image' => 'images/uploads/none.png',
                'edge_category_id' => 5
            ],
            [ 'name' => '3D', 'code' => '3D', 'image' => 'images/uploads/3d.jpg',
                'edge_category_id' => 4
            ],
            [ 'name' => 'Коста марино', 'code' => '933B', 'image' => 'images/uploads/933-в-costa-marino-75Q9.jpg',
                'edge_category_id' => 3
            ],
            [ 'name' => 'Фондо марино', 'code' => '934B', 'image' => 'images/uploads/934-в-fondo-marino-76Q0.jpg',
                'edge_category_id' => 3
            ],
            [ 'name' => 'Бементо', 'code' => '935B', 'image' => 'images/uploads/935-в-бemento-76Q2.jpg',
                'edge_category_id' => 3
            ],
            [ 'name' => 'Стромболли алеанза', 'code' => '939B', 'image' => 'images/uploads/939-в-strombolly-alleanza-12U2.jpg',
                'edge_category_id' => 3
            ],
            [ 'name' => 'Фумаре', 'code' => '941W', 'image' => 'images/uploads/941-w-fumare-09U5.jpg',
                'edge_category_id' => 3
            ],
            [ 'name' => 'Фрассино бианко', 'code' => '942W', 'image' => 'images/uploads/942-w-frassino-bianco-09U4.jpg',
                'edge_category_id' => 3
            ],
            [ 'name' => 'Фореста ди нотте', 'code' => '943W', 'image' => 'images/uploads/943-w-foresta-di-notte-24P1.jpg',
                'edge_category_id' => 3
            ],
            [ 'name' => 'Мисти рокка', 'code' => '944B', 'image' => 'images/uploads/944-в-misty-roccia--21V9-.jpg',
                'edge_category_id' => 3
            ],
            [ 'name' => 'Валле терра', 'code' => '946B', 'image' => 'images/uploads/946-в-valle-terra--46V4.jpg',
                'edge_category_id' => 3
            ],
            [ 'name' => 'Флора античе', 'code' => '947B', 'image' => 'images/uploads/947-в-flora-antiche-21V8-.jpg',
                'edge_category_id' => 3
            ],
            [ 'name' => 'Аристоун', 'code' => '422Г', 'image' => 'images/uploads/422G.jpg',
                'edge_category_id' => 2
            ],
            [ 'name' => 'Брилиант белый', 'code' => '400К', 'image' => 'images/uploads/400K.jpg',
                'edge_category_id' => 2
            ],
            [ 'name' => 'Эверест', 'code' => '417Г', 'image' => 'images/uploads/417G.jpg',
                'edge_category_id' => 2
            ],
            [ 'name' => 'Кашемир белый', 'code' => '414Т', 'image' => 'images/uploads/414Т.jpg',
                'edge_category_id' => 2
            ],
            [ 'name' => 'Антарес', 'code' => '415Г', 'image' => 'images/uploads/415G.jpg',
                'edge_category_id' => 2
            ],
            [ 'name' => 'Брилиант фантазийный', 'code' => '402К', 'image' => 'images/uploads/402K.jpg',
                'edge_category_id' => 2
            ],
            [ 'name' => 'Брилиант черный', 'code' => '401К', 'image' => 'images/uploads/401K.jpg',
                'edge_category_id' => 2
            ],
            [ 'name' => 'Античный маскарелло', 'code' => '412М', 'image' => 'images/uploads/412M.jpg',
                'edge_category_id' => 2
            ],
            [ 'name' => 'Бежевый маскарелло', 'code' => '426К', 'image' => 'images/uploads/426K.jpg',
                'edge_category_id' => 2
            ],
            [ 'name' => 'Лино бьянко', 'code' => '229М', 'image' => 'images/uploads/229M.jpg',
                'edge_category_id' => 2
            ],
            [ 'name' => 'Дуб ниагара', 'code' => '230М', 'image' => 'images/uploads/230M.jpg',
                'edge_category_id' => 2
            ],
            [ 'name' => 'Сепия', 'code' => '241М', 'image' => 'images/uploads/241M.jpg',
                'edge_category_id' => 2
            ],
            [ 'name' => 'Терра', 'code' => '244М', 'image' => 'images/uploads/244M.jpg',
                'edge_category_id' => 2
            ],
            [ 'name' => 'Голубой минерал', 'code' => '246М', 'image' => 'images/uploads/246M.jpg',
                'edge_category_id' => 2
            ],
            [ 'name' => 'Артстоун бежевый', 'code' => '248М', 'image' => 'images/uploads/248M.jpg',
                'edge_category_id' => 2
            ],
            [ 'name' => 'Орион', 'code' => '436Г', 'image' => 'images/uploads/436G.jpg',
                'edge_category_id' => 2
            ],
            [ 'name' => 'Лазурный шторм', 'code' => '411М', 'image' => 'images/uploads/411M.jpg',
                'edge_category_id' => 2
            ],
            [ 'name' => 'Бетон', 'code' => '425Т', 'image' => 'images/uploads/425Т.jpg',
                'edge_category_id' => 2
            ],
            [ 'name' => 'Песчаная яшма', 'code' => '437Г', 'image' => 'images/uploads/437G.jpg',
                'edge_category_id' => 2
            ],
            [ 'name' => 'Оникс серебристый', 'code' => '424Т', 'image' => 'images/uploads/424Т.jpg',
                'edge_category_id' => 2
            ],
            [ 'name' => 'Кристалл', 'code' => '423Т', 'image' => 'images/uploads/423Т.jpg',
                'edge_category_id' => 2
            ],
            [ 'name' => 'Альмандин', 'code' => '139М', 'image' => 'images/uploads/139M.jpg',
                'edge_category_id' => 2
            ],
            [ 'name' => 'Хальцедон', 'code' => '136М', 'image' => 'images/uploads/136M.jpg',
                'edge_category_id' => 2
            ],
            [ 'name' => 'Оникс бежевый', 'code' => '100М', 'image' => 'images/uploads/100M.jpg',
                'edge_category_id' => 2
            ],
            [ 'name' => 'Уника снежная', 'code' => '206К', 'image' => 'images/uploads/206К.jpg',
                'edge_category_id' => 2
            ],
            [ 'name' => 'Белый дуб', 'code' => '154М', 'image' => 'images/uploads/154M.jpg',
                'edge_category_id' => 2
            ],
            [ 'name' => 'Сахара', 'code' => '30М', 'image' => 'images/uploads/30M.jpg',
                'edge_category_id' => 2
            ],
            [ 'name' => 'Тростник', 'code' => '134М', 'image' => 'images/uploads/134M.jpg',
                'edge_category_id' => 2
            ],
            [ 'name' => 'Дуглас светлый', 'code' => '133М', 'image' => 'images/uploads/133M.jpg',
                'edge_category_id' => 2
            ],
            [ 'name' => 'Оникс', 'code' => '105М', 'image' => 'images/uploads/105G.jpg',
                'edge_category_id' => 2
            ],
            [ 'name' => 'Дуглас темный', 'code' => '135М', 'image' => 'images/uploads/135M.jpg',
                'edge_category_id' => 2
            ],
        ];

        foreach ($categories as $category){
            \App\EdgeCategory::create([
                'name' => $category['name'],
                'coast' => $category['coast'],
                'egoist' => $category['egoist'],
            ]);
        }

        foreach ($decors as $decor){
            \App\EdgeDecor::create([
                'name' => $decor['name'],
                'code' => $decor['code'],
                'image' => $decor['image'],
                'edge_category_id' => $decor['edge_category_id'],
            ]);

        }
    }
}
