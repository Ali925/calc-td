<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PatternAccordanceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pattern_accordances')->truncate();

        $patterns = [
            [
                'name' => 'П01', 'image' => '', 'thickness_id' => 3,
                'edge_one' => [1,2,3,4,5], 'edge_two' => [1,2,3,4,5],
                'edge_three' => [1,2,3,4,5], 'edge_four' => [1,2,3,4,5],
                'blank_type_id' => 2,  'nip_id' => 1,
                'part_side_one' => 7, 'part_side_two' => 7,'part_side_three' => 7, 'part_side_four' => 7,
                'part_edge_one' => 7, 'part_edge_two' => 7,'part_edge_three' => 7, 'part_edge_four' => 7,
            ],
            [
                'name' => 'П01', 'image' => '', 'thickness_id' => 3,
                'edge_one' => [6], 'edge_two' => [1,2,3,4,5],
                'edge_three' => [6], 'edge_four' => [1,2,3,4,5],
                'blank_type_id' => 2, 'nip_id' => 3,
                'part_side_one' => 7, 'part_side_two' => 7,'part_side_three' => 7, 'part_side_four' => 7,
                'part_edge_one' => 7, 'part_edge_two' => 7,'part_edge_three' => 7, 'part_edge_four' => 7,
            ],
            [
                'name' => 'П01', 'image' => '', 'thickness_id' => 3,
                'edge_one' => [1,2,3,4,5], 'edge_two' => [1,2,3,4,5],
                'edge_three' => [6], 'edge_four' => [1,2,3,4,5],
                'blank_type_id' => 2, 'nip_id' => 2,
                'part_side_one' => 7, 'part_side_two' => 7,'part_side_three' => 7, 'part_side_four' => 7,
                'part_edge_one' => 7, 'part_edge_two' => 7,'part_edge_three' => 7, 'part_edge_four' => 7,
            ],
        ];

        foreach ($patterns as $pattern){
            \App\PatternAccordance::create([
                'name' => $pattern['name'], 'image' => $pattern['image'], 'thickness_id' => $pattern['thickness_id'],
                'edge_one' => $pattern['edge_one'], 'edge_two' => $pattern['edge_two'],
                'edge_three' => $pattern['edge_three'], 'edge_four' => $pattern['edge_four'],
                'blank_type_id' => $pattern['blank_type_id'], 'nip_id' => $pattern['nip_id'],
                'part_side_one' => $pattern['part_side_one'], 'part_side_two' => $pattern['part_side_two'],
                'part_side_three' => $pattern['part_side_three'], 'part_side_four' => $pattern['part_side_four'],
                'part_edge_one' => $pattern['part_edge_one'], 'part_edge_two' => $pattern['part_edge_two'],
                'part_edge_three' => $pattern['part_edge_three'], 'part_edge_four' => $pattern['part_edge_four'],
            ]);

        }
    }
}
