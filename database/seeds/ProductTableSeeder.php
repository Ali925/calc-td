<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();

        $products = [
            [
                'name' => 'Боковая стойка',
                'min_length' => 570,
                'max_length' => 3030,
                'max_width' => 1200,
                'min_width' => 600,
            ],
            [
                'name' => 'Столешница повышенной влагостойкости',
                'min_length' => 570,
                'max_length' => 3030,
                'max_width' => 1200,
                'min_width' => 600,
            ],
            [
                'name' => 'Мебельный щит',
                'min_length' => 200,
                'max_length' => 3030,
                'max_width' => 1200,
                'min_width' => 200,
            ],
        ];

        $pivots = [
            [
                'form_id' => 1,
                'product_id' => 1,
            ],
            [
                'form_id' => 1,
                'product_id' => 2,
            ],
            [
                'form_id' => 2,
                'product_id' => 2,
            ],
            [
                'form_id' => 3,
                'product_id' => 2,
            ],
            [
                'form_id' => 4,
                'product_id' => 2,
            ],
            [
                'form_id' => 5,
                'product_id' => 2,
            ],
            [
                'form_id' => 1,
                'product_id' => 3,
            ],
        ];

        foreach ($products as $product){
            \App\Product::create([
                'name' => $product['name'],
                'min_length' => $product['min_length'],
                'max_length' => $product['max_length'],
                'max_width' => $product['max_width'],
                'min_width' => $product['min_width'],
            ]);
        }

        foreach ($pivots as $pivot){
            DB::table('form_product')->insert([
                'form_id' => $pivot['form_id'],
                'product_id' => $pivot['product_id'],
            ]);

        }
    }
}
