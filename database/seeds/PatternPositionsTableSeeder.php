<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatternPositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pattern_positions')->truncate();
        DB::table('pattern_option_pattern_position')->truncate();

        $positions = [
            [ 'name' => 'Сторона 1', 'value' => 'side-1', ],
            [ 'name' => 'Угол 1', 'value' => 'angle-1', ],
            [ 'name' => 'Сторона 2', 'value' => 'side-2', ],
            [ 'name' => 'Угол 2', 'value' => 'angle-2', ],
            [ 'name' => 'Сторона 3', 'value' => 'side-3', ],
            [ 'name' => 'Угол 3', 'value' => 'angle-3', ],
            [ 'name' => 'Сторона 4', 'value' => 'side-4', ],
            [ 'name' => 'Угол 4', 'value' => 'angle-4', ],
        ];

        $pivots = [
            ['pattern_option_id' => 1, 'pattern_position_id' => 1, ],
            ['pattern_option_id' => 2, 'pattern_position_id' => 1, ],
            ['pattern_option_id' => 3, 'pattern_position_id' => 1, ],
            ['pattern_option_id' => 4, 'pattern_position_id' => 1, ],
            ['pattern_option_id' => 5, 'pattern_position_id' => 1, ],
            ['pattern_option_id' => 5, 'pattern_position_id' => 3, ],
            ['pattern_option_id' => 9, 'pattern_position_id' => 3, ],
            ['pattern_option_id' => 10, 'pattern_position_id' => 3, ],
            ['pattern_option_id' => 1, 'pattern_position_id' => 5, ],
            ['pattern_option_id' => 2, 'pattern_position_id' => 5, ],
            ['pattern_option_id' => 3, 'pattern_position_id' => 5, ],
            ['pattern_option_id' => 4, 'pattern_position_id' => 5, ],
            ['pattern_option_id' => 5, 'pattern_position_id' => 5, ],
            ['pattern_option_id' => 5, 'pattern_position_id' => 7, ],
            ['pattern_option_id' => 9, 'pattern_position_id' => 7, ],
            ['pattern_option_id' => 10, 'pattern_position_id' => 7, ],
            ['pattern_option_id' => 5, 'pattern_position_id' => 2, ],
            ['pattern_option_id' => 6, 'pattern_position_id' => 2, ],
            ['pattern_option_id' => 7, 'pattern_position_id' => 2, ],
            ['pattern_option_id' => 8, 'pattern_position_id' => 2, ],
            ['pattern_option_id' => 5, 'pattern_position_id' => 4, ],
            ['pattern_option_id' => 6, 'pattern_position_id' => 4, ],
            ['pattern_option_id' => 7, 'pattern_position_id' => 4, ],
            ['pattern_option_id' => 8, 'pattern_position_id' => 4, ],
            ['pattern_option_id' => 5, 'pattern_position_id' => 6, ],
            ['pattern_option_id' => 6, 'pattern_position_id' => 6, ],
            ['pattern_option_id' => 7, 'pattern_position_id' => 6, ],
            ['pattern_option_id' => 8, 'pattern_position_id' => 6, ],
            ['pattern_option_id' => 5, 'pattern_position_id' => 8, ],
            ['pattern_option_id' => 6, 'pattern_position_id' => 8, ],
            ['pattern_option_id' => 7, 'pattern_position_id' => 8, ],
            ['pattern_option_id' => 8, 'pattern_position_id' => 8, ],
        ];

        foreach ($positions as $position){
            \App\PatternPosition::create([
                'name' => $position['name'],
                'value' => $position['value'],
            ]);
        }

        foreach ($pivots as $pivot){
            DB::table('pattern_option_pattern_position')->insert([
                'pattern_option_id' => $pivot['pattern_option_id'],
                'pattern_position_id' => $pivot['pattern_position_id'],
            ]);
        }
    }
}
