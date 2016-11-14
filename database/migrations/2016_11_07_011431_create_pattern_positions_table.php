<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatternPositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pattern_positions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('value');
            $table->timestamps();
        });

        Schema::create('pattern_option_pattern_position', function (Blueprint $table){
            $table->unsignedInteger('pattern_option_id');
            $table->unsignedInteger('pattern_position_id');
        });

        Schema::create('nip_pattern_position', function (Blueprint $table){
            $table->unsignedInteger('nip_id');
            $table->unsignedInteger('pattern_position_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pattern_positions');
        Schema::dropIfExists('pattern_option_pattern_position');
        Schema::dropIfExists('nip_pattern_position');
    }
}
