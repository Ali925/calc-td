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
            $table->text('edge_one');
            $table->text('edge_two');
            $table->text('edge_three');
            $table->text('edge_four');
            $table->unsignedInteger('blank_type_id');
            $table->unsignedInteger('nip_id');
            $table->text('part_side_one');
            $table->text('part_side_two');
            $table->text('part_side_three');
            $table->text('part_side_four');
            $table->text('part_edge_one');
            $table->text('part_edge_two');
            $table->text('part_edge_three');
            $table->text('part_edge_four');
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
