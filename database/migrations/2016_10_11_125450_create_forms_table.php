<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nulled();
            $table->integer('coast')->nulled();
            $table->string('image')->nulled();
            $table->string('pattern_image')->nulled();
            $table->timestamps();
        });

        Schema::create('blank_type_form', function (Blueprint $table){
            $table->unsignedInteger('form_id');
            $table->unsignedInteger('blank_type_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forms');
        Schema::dropIfExists('blank_type_form');
    }
}
