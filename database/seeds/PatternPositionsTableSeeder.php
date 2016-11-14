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
        DB::table('nip_pattern_position')->truncate();

        $positions = [
            [ 'name' => 'Сторона 1', 'value' => 'side1', ],
            [ 'name' => 'Угол 1', 'value' => 'angle1', ],
            [ 'name' => 'Сторона 2', 'value' => 'side2', ],
            [ 'name' => 'Угол 2', 'value' => 'angle2', ],
            [ 'name' => 'Сторона 3', 'value' => 'side3', ],
            [ 'name' => 'Угол 3', 'value' => 'angle3', ],
            [ 'name' => 'Сторона 4', 'value' => 'side4', ],
            [ 'name' => 'Угол 4', 'value' => 'angle4', ],
        ];

        $pivots = [
            [
                'nip_id' => 2,
                'pattern_position_id' => 5
            ],
            [
                'nip_id' => 3,
                'pattern_position_id' => 5
            ],
            [
                'nip_id' => 3,
                'pattern_position_id' => 1
            ],
        ];



        foreach ($positions as $position){
            \App\PatternPosition::create([
                'name' => $position['name'],
                'value' => $position['value'],
            ]);
        }

        foreach ($pivots as $pivot){
            DB::table('nip_pattern_position')->insert([
                'nip_id' => $pivot['nip_id'],
                'pattern_position_id' => $pivot['pattern_position_id'],
            ]);
        }

    }
}
