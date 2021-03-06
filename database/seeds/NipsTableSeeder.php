<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nips')->truncate();

        $datas = [
            [
                'name' => 'Без завала',
                'value' => 'A',
                'description' => 'A (без завала)  -  Отсутствие закругления (загиба) пластика на торец 
                                    столешницы/детали, отделка края осуществляется путем нанесения кромки.',
            ],
            [
                'name' => 'Однозавальный',
                'value' => '1U',
                'description' => '1U  -  Завал исполнен только по лицевому торцу столешницы/детали',
            ],
            [
                'name' => 'Двухзавальный',
                'value' => '2U',
                'description' => '2U  -  Завал исполнен по обоим (лицевому и тыльному) торцам столешницы/детали',
            ],
        ];

        $pivots = [
            [
                'nip_id' => 1,
                'thickness_id' => 1,
            ],
            [
                'nip_id' => 1,
                'thickness_id' => 2,
            ],
            [
                'nip_id' => 1,
                'thickness_id' => 3,
            ],
            [
                'nip_id' => 2,
                'thickness_id' => 3,
            ],
            [
                'nip_id' => 3,
                'thickness_id' => 3,
            ],
        ];

        foreach ($datas as $data){
            \App\Nip::create([
                'name' => $data['name'],
                'value' => $data['value'],
                'description' => $data['description'],
            ]);
        }

        foreach ($pivots as $pivot){
            DB::table('nip_thickness')->insert([
                'nip_id' => $pivot['nip_id'],
                'thickness_id' => $pivot['thickness_id'],
            ]);
        }
    }
}
