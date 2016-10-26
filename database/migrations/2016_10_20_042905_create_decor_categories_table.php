<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDecorCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('decor_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nulled();
            $table->integer('coast')->nulled();
            $table->timestamps();
        });

        Schema::create('decor_category_product', function (Blueprint $table){
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('decor_category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('decor_categories');
        Schema::dropIfExists('decor_category_product');

    }
}
