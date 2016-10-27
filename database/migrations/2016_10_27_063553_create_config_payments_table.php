<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('merchant')->nulled();
            $table->string('currency')->default('RUB');
            $table->string('language')->default('RU');
            $table->string('comment')->default('Оплата заказа');
            $table->text('url_return_ok');
            $table->text('url_return_no');
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
        Schema::dropIfExists('config_payments');
    }
}
