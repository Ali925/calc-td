<?php

use Illuminate\Database\Seeder;

class BlankTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blank_types')->truncate();

        $types = [
            [
                'name' => 'Мебельный щит',
                'description' => '',
                "min_width" => 100,
                "max_width" => 1000,
                "min_length" => 500,
                "max_length" => 3000,

            ],
            [
                'name' => 'Столешница влагостойкая',
                'description' => '',
                "min_width" => 100,
                "max_width" => 1000,
                "min_length" => 400,
                "max_length" => 2500,
            ],
            [
                'name' => 'Боковая стойка',
                'description' => '',
                "min_width" => 100,
                "max_width" => 1000,
                "min_length" => 500,
                "max_length" => 3000,
            ],
        ];

        foreach ($types as $type){
            \App\BlankType::create([
                'name' => $type['name'],
                'description' => $type['description'],
                "min_width" => $type['min_width'],
                "max_width" => $type['max_width'],
                "min_length" => $type['min_length'],
                "max_length" => $type['max_length'],
            ]);
        }
    }
}
