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
            ['option' => 'Merchant_ID', 'value' => '556699'],
            ['option' => 'OrderCurrency', 'value' => 'RUB'],
            ['option' => 'Language', 'value' => 'RU'],
            ['option' => 'OrderComment', 'value' => 'Комментарий к платежу'],
        ];

        foreach ($payments as $payment){
            \App\ConfigPayment::create([ 'option' => $payment['option'], 'value' => $payment['value'] ]);
        }

    }
}
