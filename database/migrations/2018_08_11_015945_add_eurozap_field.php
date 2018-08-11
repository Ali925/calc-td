<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEurozapField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('ready_products', function ($table) {
            $table->integer('eurozap_one_size')->nullable();
            $table->integer('eurozap_two_size')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('ready_products', function ($table) {
            $table->dropColumn('eurozap_one_size');
            $table->dropColumn('eurozap_two_size');
        });
    }
}
