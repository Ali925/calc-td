<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_num');
            $table->string('order_amount');
            $table->unsignedInteger('customer_id');
            $table->timestamps();
        });

        Schema::create('order_ready_product',function (Blueprint $table){
            $table->unsignedInteger('order_id');
            $table->unsignedInteger('ready_product_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_ready_product');
    }
}
