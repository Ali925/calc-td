<?php

use Illuminate\Database\Seeder;

class ThicknessesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('thicknesses')->truncate();


        $datas = [
            [
                'name' => '4',
                'value' => 4,
            ],
            [
                'name' => '10',
                'value' => 10,
            ],
            [
                'name' => '38',
                'value' => 38,
            ],
        ];

        foreach ($datas as $data){
            \App\Thickness::create([
                'name' => $data['name'],
                'value' => $data['value'],
            ]);
        }
    }
}
