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
                'name' => 'П01', 'image' => 'images/uploads/pattern/p01.png', 'thickness_id' => 3, 'blank_type_id' => 2, 'nip_id' => 1,
                'part_side_one' => 7, 'part_side_two' => 7,'part_side_three' => 7, 'part_side_four' => 7,
                'part_edge_one' => 7, 'part_edge_two' => 7,'part_edge_three' => 7, 'part_edge_four' => 7,
                'form_id' => 1
            ],
            [
                'name' => 'П01', 'image' => 'images/uploads/pattern/p01.png', 'thickness_id' => 3, 'blank_type_id' => 2, 'nip_id' => 2,
                'part_side_one' => 7, 'part_side_two' => 7,'part_side_three' => 7, 'part_side_four' => 7,
                'part_edge_one' => 7, 'part_edge_two' => 7,'part_edge_three' => 7, 'part_edge_four' => 7,
                'form_id' => 1
            ],
            [
                'name' => 'П01', 'image' => 'images/uploads/pattern/p01.png', 'thickness_id' => 3, 'blank_type_id' => 2, 'nip_id' => 3,
                'part_side_one' => 7, 'part_side_two' => 7,'part_side_three' => 7, 'part_side_four' => 7,
                'part_edge_one' => 7, 'part_edge_two' => 7,'part_edge_three' => 7, 'part_edge_four' => 7,
                'form_id' => 1
            ],
        ];

        foreach ($patterns as $pattern){
            \App\PatternAccordance::create([
                'name' => $pattern['name'], 'image' => $pattern['image'], 'thickness_id' => $pattern['thickness_id'],
                'blank_type_id' => $pattern['blank_type_id'], 'nip_id' => $pattern['nip_id'],
                'part_side_one' => $pattern['part_side_one'], 'part_side_two' => $pattern['part_side_two'],
                'part_side_three' => $pattern['part_side_three'], 'part_side_four' => $pattern['part_side_four'],
                'part_edge_one' => $pattern['part_edge_one'], 'part_edge_two' => $pattern['part_edge_two'],
                'part_edge_three' => $pattern['part_edge_three'], 'part_edge_four' => $pattern['part_edge_four'],
                'form_id' => $pattern['form_id']
            ]);

        }
    }
}
