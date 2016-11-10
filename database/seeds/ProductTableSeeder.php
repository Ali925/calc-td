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
                'blank_type_id' => 1,
                'decor_category_id' => 1,
                'nip_id' => 1,
                'thickness_id' => 1,
                'length' => 3050,
                'width' => 600,
                'coast' => 2240,
            ],
            [
                'blank_type_id' => 1,
                'decor_category_id' => 1,
                'nip_id' => 1,
                'thickness_id' => 1,
                'length' => 3050,
                'width' => 1200,
                'coast' => 4750,
            ],
            [
                'blank_type_id' => 1,
                'decor_category_id' => 1,
                'nip_id' => 1,
                'thickness_id' => 2,
                'length' => 3050,
                'width' => 600,
                'coast' => 2500,
            ],
            [
                'blank_type_id' => 1,
                'decor_category_id' => 1,
                'nip_id' => 1,
                'thickness_id' => 2,
                'length' => 3050,
                'width' => 1200,
                'coast' => 5290,
            ],
        ];

        foreach ($products as $product){
            \App\Product::create([
                'blank_type_id' => $product['blank_type_id'],
                'decor_category_id' => $product['decor_category_id'],
                'nip_id' => $product['nip_id'],
                'thickness_id' => $product['thickness_id'],
                'length' => $product['length'],
                'width' => $product['width'],
                'coast' => $product['coast'],
            ]);
        }
    }
}
