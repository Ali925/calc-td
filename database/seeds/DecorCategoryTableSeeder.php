<?php

use Illuminate\Database\Seeder;

class DecorCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('decor_categories')->truncate();

        $categories = [
            ['name' => 'Премиум +', 'coast' => 4500 ],
            ['name' => 'Премиум', 'coast' => 3940 ],
            ['name' => 'Универсал', 'coast' => 1870 ],
            ['name' => 'Классик', 'coast' => 3880 ],
        ];

        foreach ($categories as $category){
            \App\DecorCategory::create([
                'name' => $category['name'],
                'coast' => $category['coast']
            ]);
        }
    }
}
