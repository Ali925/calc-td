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
            [ 'name' => 'Аристоун', 'code' => '422Г', 'image' => '', 'decor_category_id' => 2 ],
            [ 'name' => 'Брилиант белый', 'code' => '400К', 'image' => '', 'decor_category_id' => 2 ],
            [ 'name' => 'Эверест', 'code' => '417Г', 'image' => '', 'decor_category_id' => 2 ],
            [ 'name' => 'Кашемир белый', 'code' => '414Т', 'image' => '', 'decor_category_id' => 2 ],
            [ 'name' => 'Антарес', 'code' => '415Г', 'image' => '', 'decor_category_id' => 2 ],
            [ 'name' => 'Брилиант фантазийный', 'code' => '402К', 'image' => '', 'decor_category_id' => 2 ],
            [ 'name' => 'Брилиант черный', 'code' => '401К', 'image' => '', 'decor_category_id' => 2 ],
            [ 'name' => 'Античный маскарелло', 'code' => '412М', 'image' => '', 'decor_category_id' => 1 ],
            [ 'name' => 'Бежевый маскарелло', 'code' => '426К', 'image' => '', 'decor_category_id' => 1 ],
            [ 'name' => 'Лино бьянко', 'code' => '229М', 'image' => '', 'decor_category_id' => 2 ],
            [ 'name' => 'Дуб ниагара', 'code' => '230М', 'image' => '', 'decor_category_id' => 2 ],
            [ 'name' => 'Сепия', 'code' => '241М', 'image' => '', 'decor_category_id' => 2 ],
            [ 'name' => 'Терра', 'code' => '244М', 'image' => '', 'decor_category_id' => 2 ],
            [ 'name' => 'Голубой минерал', 'code' => '246М', 'image' => '', 'decor_category_id' => 2 ],
            [ 'name' => 'Артстоун бежевый', 'code' => '248М', 'image' => '', 'decor_category_id' => 2 ],
            [ 'name' => 'Орион', 'code' => '436Г', 'image' => '', 'decor_category_id' => 1 ],
            [ 'name' => 'Лазурный шторм', 'code' => '411М', 'image' => '', 'decor_category_id' => 1 ],
            [ 'name' => 'Бетон', 'code' => '425Т', 'image' => '', 'decor_category_id' => 1 ],
            [ 'name' => 'Песчаная яшма', 'code' => '437Г', 'image' => '', 'decor_category_id' => 2 ],
            [ 'name' => 'Оникс серебристый', 'code' => '424Т', 'image' => '', 'decor_category_id' => 1 ],
            [ 'name' => 'Кристалл', 'code' => '423Т', 'image' => '', 'decor_category_id' => 1 ],
            [ 'name' => 'Альмандин', 'code' => '139М', 'image' => '', 'decor_category_id' => 4 ],
            [ 'name' => 'Хальцедон', 'code' => '136М', 'image' => '', 'decor_category_id' => 4 ],
            [ 'name' => 'Оникс бежевый', 'code' => '100М', 'image' => '', 'decor_category_id' => 4 ],
            [ 'name' => 'Уника снежная', 'code' => '206К', 'image' => '', 'decor_category_id' => 4 ],
            [ 'name' => 'Белый дуб', 'code' => '154М', 'image' => '', 'decor_category_id' => 4 ],
            [ 'name' => 'Сахара', 'code' => '30М', 'image' => '', 'decor_category_id' => 4 ],
            [ 'name' => 'Тростник', 'code' => '134М', 'image' => '', 'decor_category_id' => 3 ],
            [ 'name' => 'Дуглас светлый', 'code' => '133М', 'image' => '', 'decor_category_id' => 3 ],
            [ 'name' => 'Оникс', 'code' => '105М', 'image' => '', 'decor_category_id' => 3 ],
            [ 'name' => 'Дуглас темный', 'code' => '135М', 'image' => '', 'decor_category_id' => 3 ],
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
