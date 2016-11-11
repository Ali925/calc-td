<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatternAccordancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pattern_accordances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('image');
            $table->integer('thickness');
            $table->text('edge_one')->nulled();
            $table->text('edge_two')->nulled();
            $table->text('edge_three')->nulled();
            $table->text('edge_four')->nulled();
            $table->integer('blank_type');
            $table->integer('nip');
            $table->text('euro')->nulled();
            $table->text('radius')->nulled();
            $table->text('bevel')->nulled();
            $table->text('standard')->nulled();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pattern_accordances');
    }
}
