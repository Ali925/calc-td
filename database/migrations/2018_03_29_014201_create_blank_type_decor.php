<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlankTypeDecor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::dropIfExists('blank_type_decors');

         Schema::create('blank_type_decor', function (Blueprint $table){
            $table->unsignedInteger('blank_type_id');
            $table->unsignedInteger('decor_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blank_type_decors');
        Schema::dropIfExists('blank_type_decor');
    }
}
