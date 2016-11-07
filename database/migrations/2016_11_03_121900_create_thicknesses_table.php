<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThicknessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thicknesses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('value');
            $table->timestamps();
        });

        Schema::create('product_thickness', function (Blueprint $table){
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('thickness_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thicknesses');
        Schema::dropIfExists('product_thickness');
    }
}
