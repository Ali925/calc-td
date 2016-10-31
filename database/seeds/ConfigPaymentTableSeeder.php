<?php

use Illuminate\Database\Seeder;

class ConfigPaymentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('config_payments')->truncate();

        $payments = [
            ['option' => 'merchant', 'value' => '556699'],
            ['option' => 'currency', 'value' => 'RUB'],
            ['option' => 'language', 'value' => 'RU'],
            ['option' => 'comment', 'value' => 'Комментарий к платежу'],
            ['option' => 'url_return_ok', 'value' => ''],
            ['option' => 'url_return_no', 'value' => ''],
        ];

        foreach ($payments as $payment){
            \App\ConfigPayment::create([ 'option' => $payment['option'], 'value' => $payment['value'] ]);
        }

    }
}
