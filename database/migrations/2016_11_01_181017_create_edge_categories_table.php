<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEdgeCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edge_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('coast');
            $table->timestamps();
        });

        Schema::create('edge_category_decor', function (Blueprint $table){
            $table->unsignedInteger('decor_id');
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
        Schema::dropIfExists('edge_categories');
        Schema::dropIfExists('edge_category_decor');
    }
}
