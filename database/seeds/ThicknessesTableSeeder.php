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

        $pivots = [
            [
                'blank_type_id' => 1,
                'thickness_id' => 1,
            ],
            [
                'blank_type_id' => 1,
                'thickness_id' => 2,
            ],
            [
                'blank_type_id' => 2,
                'thickness_id' => 3,
            ],
            [
                'blank_type_id' => 3,
                'thickness_id' => 3,
            ],
        ];

        foreach ($datas as $data){
            \App\Thickness::create([
                'name' => $data['name'],
                'value' => $data['value'],
            ]);
        }

        foreach ($pivots as $pivot){
            DB::table('blank_type_thickness')->insert([
                'blank_type_id' => $pivot['blank_type_id'],
                'thickness_id' => $pivot['thickness_id'],
            ]);
        }
    }
}
