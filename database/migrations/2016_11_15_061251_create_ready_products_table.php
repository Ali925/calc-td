<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReadyProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ready_products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('blank_type_id');
            $table->unsignedInteger('thickness_id');
            $table->unsignedInteger('form_id');
            $table->unsignedInteger('decor_category_id');
            $table->unsignedInteger('decor_id');
            $table->unsignedInteger('wrapper_id');
            $table->unsignedInteger('pattern_accordance_id');
            $table->unsignedInteger('part_side_one');
            $table->unsignedInteger('part_side_two');
            $table->unsignedInteger('part_side_three');
            $table->unsignedInteger('part_side_four');
            $table->unsignedInteger('part_edge_one');
            $table->unsignedInteger('part_edge_two');
            $table->unsignedInteger('part_edge_three');
            $table->unsignedInteger('part_edge_four');
            $table->unsignedInteger('edge_one');
            $table->unsignedInteger('edge_two');
            $table->unsignedInteger('edge_three');
            $table->unsignedInteger('edge_four');
            $table->unsignedInteger('nip_id');
            $table->integer('width');
            $table->integer('length');
            $table->integer('coast');
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
        Schema::dropIfExists('ready_products');
    }
}
