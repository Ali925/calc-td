<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlankTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blank_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->integer('min_width')->nulled();
            $table->integer('max_width')->nulled();
            $table->integer('min_length')->nulled();
            $table->integer('max_length')->nulled();
            $table->timestamps();
        });

        Schema::create('blank_type_thickness', function (Blueprint $table){
            $table->unsignedInteger('blank_type_id');
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
        Schema::dropIfExists('blank_types');
        Schema::dropIfExists('blank_type_thickness');
    }
}
