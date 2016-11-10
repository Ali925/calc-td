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

        foreach ($datas as $data){
            \App\Nip::create([
                'name' => $data['name'],
                'value' => $data['value'],
                'description' => $data['description'],
            ]);
        }
    }
}
