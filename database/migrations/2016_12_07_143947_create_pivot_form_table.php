<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_edge_1', function (Blueprint $table){
            $table->unsignedInteger('form_id');
            $table->unsignedInteger('pattern_option_id');
        });
        Schema::create('form_edge_2', function (Blueprint $table){
            $table->unsignedInteger('form_id');
            $table->unsignedInteger('pattern_option_id');
        });
        Schema::create('form_edge_3', function (Blueprint $table){
            $table->unsignedInteger('form_id');
            $table->unsignedInteger('pattern_option_id');
        });
        Schema::create('form_edge_4', function (Blueprint $table){
            $table->unsignedInteger('form_id');
            $table->unsignedInteger('pattern_option_id');
        });
        Schema::create('form_side_1', function (Blueprint $table){
            $table->unsignedInteger('form_id');
            $table->unsignedInteger('pattern_option_id');
        });
        Schema::create('form_side_2', function (Blueprint $table){
            $table->unsignedInteger('form_id');
            $table->unsignedInteger('pattern_option_id');
        });
        Schema::create('form_side_3', function (Blueprint $table){
            $table->unsignedInteger('form_id');
            $table->unsignedInteger('pattern_option_id');
        });
        Schema::create('form_side_4', function (Blueprint $table){
            $table->unsignedInteger('form_id');
            $table->unsignedInteger('pattern_option_id');
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
    }
}
