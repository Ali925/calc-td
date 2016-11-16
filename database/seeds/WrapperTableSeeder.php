<?php

use Illuminate\Database\Seeder;

class WrapperTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wreappers = [
            [
                'name' => 'ДМ',
                'width' => 1200,
                'length' => 3050,
                'coast' => 737,
            ],
            [
                'name' => 'ДМ',
                'width' => 1200,
                'length' => 1500,
                'coast' => 621,
            ],
            [
                'name' => 'ДМ',
                'width' => 1200,
                'length' => 1000,
                'coast' => 621,
            ],
        ];

        foreach ($wreappers as $wreapper){
            \App\Wrapper::create([
                'name' => $wreapper['name'],
                'width' => $wreapper['width'],
                'length' => $wreapper['length'],
                'coast' => $wreapper['coast'],
            ]);
        }

    }
}
