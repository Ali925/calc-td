<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AccessSideFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('forms', function ($table) {
            $table->integer('access_one_side');
            $table->integer('access_two_side');
            $table->integer('access_three_side');
            $table->integer('access_four_side');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('forms', function ($table) {
            $table->dropColumn('access_one_side');
            $table->dropColumn('access_two_side');
            $table->dropColumn('access_three_side');
            $table->dropColumn('access_four_side');
        });
    }
}
