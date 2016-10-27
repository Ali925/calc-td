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
            $table->boolean('card_payment');
            $table->boolean('ya_payment');
            $table->boolean('wm_payment');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('form_id');
            $table->unsignedInteger('decor_id');
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
        Schema::dropIfExists('orders');
    }
}
