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
        DB::table('blank_type_form')->truncate();

        $forms = [
            [
                'name' => 'Прямоугольная и с закруглениями, боковая стойка',
                'coast' => 200,
                'image' => 'images/uploads/forms/1.png',
                'pattern_image' => 'images/uploads/back/back1.png',
            ],
            [
                'name' => 'Столешница с закруглениями в виде полукруга',
                'coast' => 2000,
                'image' => 'images/uploads/forms/2.png',
                'pattern_image' => 'images/uploads/back/back2.png',
            ],
            [
                'name' => 'Столешница с круглым столом',
                'coast' => 4000,
                'image' => 'images/uploads/forms/3.png',
                'pattern_image' => 'images/uploads/back/back3.png',
            ],
            [
                'name' => 'Столешница круглая',
                'coast' => 2000,
                'image' => 'images/uploads/forms/4.png',
                'pattern_image' => 'images/uploads/back/back4.png',
            ],
            [
                'name' => 'Угловой элемент',
                'coast' => 2000,
                'image' => 'images/uploads/forms/5.png',
                'pattern_image' => 'images/uploads/back/back5.png',
            ],
        ];

        $pivots = [
            [ 'form_id' => 1, 'blank_type_id' => 1 ],
            [ 'form_id' => 1, 'blank_type_id' => 3 ],
            [ 'form_id' => 1, 'blank_type_id' => 2 ],
            [ 'form_id' => 2, 'blank_type_id' => 2 ],
            [ 'form_id' => 3, 'blank_type_id' => 2 ],
            [ 'form_id' => 4, 'blank_type_id' => 2 ],
            [ 'form_id' => 5, 'blank_type_id' => 2 ],
        ];

        foreach ($forms as $form){
            \App\Form::create([
                'name' => $form['name'],
                'coast' => $form['coast'],
                'image' => $form['image'],
                'pattern_image' => $form['pattern_image'],
            ]);
        }

        foreach ($pivots as $pivot){
            DB::table('blank_type_form')->insert([
                'form_id' => $pivot['form_id'],
                'blank_type_id' => $pivot['blank_type_id']
            ]);
        }
    }
}
