<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('forms')->truncate();

        $forms = [
            [
                'name' => 'Прямоугольная и с закруглениями, боковая стойка',
                'coast' => 200,
                'image' => 'images/uploads/forms/1.png',

            ],
            [
                'name' => 'Столешница с закруглениями в виде полукруга',
                'coast' => 2000,
                'image' => 'images/uploads/forms/2.png',
            ],
            [
                'name' => 'Столешница с круглым столом',
                'coast' => 4000,
                'image' => 'images/uploads/forms/3.png',
            ],
            [
                'name' => 'Столешница круглая',
                'coast' => 2000,
                'image' => 'images/uploads/forms/4.png',
            ],
            [
                'name' => 'Угловой элемент',
                'coast' => 2000,
                'image' => 'images/uploads/forms/5.png',
            ],
        ];

        foreach ($forms as $form){
            \App\Form::create([
                'name' => $form['name'],
                'coast' => $form['coast'],
                'image' => $form['image'],
            ]);
        }
    }
}
