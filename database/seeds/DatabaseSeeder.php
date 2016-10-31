<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DecorCategoryTableSeeder::class);
        $this->call(DecorTableSeeder::class);
        $this->call(FormTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ConfigPaymentTableSeeder::class);
    }
}
