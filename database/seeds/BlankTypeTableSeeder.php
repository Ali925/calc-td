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
            ],
            [
                'name' => 'Столешница влагостойкая',
                'description' => '',
            ],
            [
                'name' => 'Боковая стойка',
                'description' => '',
            ],
        ];

        foreach ($types as $type){
            \App\BlankType::create([
                'name' => $type['name'],
                'description' => $type['description'],
            ]);
        }
    }
}
