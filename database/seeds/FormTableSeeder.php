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
                'image' => '',

            ],
            [
                'name' => 'Столешница с закруглениями в виде полукруга',
                'coast' => 2000,
                'image' => '',
            ],
            [
                'name' => 'Столешница с круглым столом',
                'coast' => 4000,
                'image' => '',
            ],
            [
                'name' => 'Столешница круглая',
                'coast' => 2000,
                'image' => '',
            ],
            [
                'name' => 'Угловой элемент',
                'coast' => 2000,
                'image' => '',
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
