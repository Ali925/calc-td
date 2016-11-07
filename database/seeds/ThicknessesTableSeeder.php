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
        DB::table('product_thickness')->truncate();


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
                'thickness_id' => 3,
                'product_id' => 1,
            ],
            [
                'thickness_id' => 3,
                'product_id' => 2,
            ],
            [
                'thickness_id' => 1,
                'product_id' => 3,
            ],
            [
                'thickness_id' => 2,
                'product_id' => 3,
            ],
        ];

        foreach ($datas as $data){
            \App\Thickness::create([
                'name' => $data['name'],
                'value' => $data['value'],
            ]);
        }

        foreach ($pivots as $pivot){
            DB::table('product_thickness')->insert([
                'thickness_id' => $pivot['thickness_id'],
                'product_id' => $pivot['product_id'],
            ]);
        }
    }
}
