<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EdgeTwoPivotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('edge_two_pivot')->truncate();

        $pivots = [
            [ 'pattern_accordance_id' => 1, 'edge_category_id' => 1 ],
            [ 'pattern_accordance_id' => 1, 'edge_category_id' => 2 ],
            [ 'pattern_accordance_id' => 1, 'edge_category_id' => 3 ],
            [ 'pattern_accordance_id' => 1, 'edge_category_id' => 4 ],
            [ 'pattern_accordance_id' => 1, 'edge_category_id' => 5 ],
            [ 'pattern_accordance_id' => 2, 'edge_category_id' => 1 ],
            [ 'pattern_accordance_id' => 2, 'edge_category_id' => 2 ],
            [ 'pattern_accordance_id' => 2, 'edge_category_id' => 3 ],
            [ 'pattern_accordance_id' => 2, 'edge_category_id' => 4 ],
            [ 'pattern_accordance_id' => 2, 'edge_category_id' => 5 ],
            [ 'pattern_accordance_id' => 3, 'edge_category_id' => 1 ],
            [ 'pattern_accordance_id' => 3, 'edge_category_id' => 2 ],
            [ 'pattern_accordance_id' => 3, 'edge_category_id' => 3 ],
            [ 'pattern_accordance_id' => 3, 'edge_category_id' => 4 ],
            [ 'pattern_accordance_id' => 3, 'edge_category_id' => 5 ],
        ];

        foreach ($pivots as $pivot){
            DB::table('edge_two_pivot')->insert([
                'pattern_accordance_id' => $pivot['pattern_accordance_id'],
                'edge_category_id' => $pivot['edge_category_id'],
            ]);
        }
    }
}
