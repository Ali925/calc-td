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
            $table->unsignedInteger('nip_id');
            $table->unsignedInteger('euro_id');
            $table->unsignedInteger('bevel_id');
            $table->unsignedInteger('standard_id');
            $table->unsignedInteger('radius_id');
            $table->unsignedInteger('edge_one');
            $table->unsignedInteger('edge_two');
            $table->unsignedInteger('edge_three');
            $table->unsignedInteger('edge_four');
            $table->unsignedInteger('pattern_accordance_id');
            $table->unsignedInteger('wrapper_id');
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
