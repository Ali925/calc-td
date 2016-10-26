<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDecorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('decors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nulled();
            $table->string('code')->nulled();
            $table->string('image')->nulled();
            $table->unsignedInteger('decor_category_id');
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
        Schema::dropIfExists('decors');
    }
}
