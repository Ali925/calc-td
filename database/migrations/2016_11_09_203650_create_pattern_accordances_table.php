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
            $table->string('image');
            $table->unsignedInteger('thickness_id');
            $table->unsignedInteger('blank_type_id');
            $table->unsignedInteger('nip_id');
            $table->unsignedInteger('part_side_one');
            $table->unsignedInteger('part_side_two');
            $table->unsignedInteger('part_side_three');
            $table->unsignedInteger('part_side_four');
            $table->unsignedInteger('part_edge_one');
            $table->unsignedInteger('part_edge_two');
            $table->unsignedInteger('part_edge_three');
            $table->unsignedInteger('part_edge_four');
            $table->timestamps();
        });

        Schema::create('edge_one_pivot',function (Blueprint $table){
            $table->unsignedInteger('pattern_accordance_id');
            $table->unsignedInteger('edge_category_id');
        });
        Schema::create('edge_two_pivot',function (Blueprint $table){
            $table->unsignedInteger('pattern_accordance_id');
            $table->unsignedInteger('edge_category_id');
        });
        Schema::create('edge_three_pivot',function (Blueprint $table){
            $table->unsignedInteger('pattern_accordance_id');
            $table->unsignedInteger('edge_category_id');
        });
        Schema::create('edge_four_pivot',function (Blueprint $table){
            $table->unsignedInteger('pattern_accordance_id');
            $table->unsignedInteger('edge_category_id');
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
        Schema::dropIfExists('edge_one_pivot');
        Schema::dropIfExists('edge_two_pivot');
        Schema::dropIfExists('edge_three_pivot');
        Schema::dropIfExists('edge_four_pivot');
    }
}
