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
        $this->call(BlankTypeTableSeeder::class);
        $this->call(DecorCategoryTableSeeder::class);
        $this->call(EdgeCategoryTableSeeder::class);
        $this->call(DecorTableSeeder::class);
        $this->call(FormTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ConfigPaymentTableSeeder::class);
        $this->call(NipsTableSeeder::class);
        $this->call(ThicknessesTableSeeder::class);
        $this->call(PatternOptionsTableSeeder::class);
        $this->call(PatternPositionsTableSeeder::class);
        $this->call(PatternAccordanceTableSeeder::class);
        $this->call(EdgeOnePivotTableSeeder::class);
        $this->call(EdgeTwoPivotTableSeeder::class);
        $this->call(EdgeThreePivotTableSeeder::class);
        $this->call(EdgeFourPivotTableSeeder::class);
    }
}
