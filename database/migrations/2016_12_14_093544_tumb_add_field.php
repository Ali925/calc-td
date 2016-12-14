<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TumbAddField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('edge_decors', function ($table) {
            $table->string('thumb')->nullable();
        });
        Schema::table('decors', function ($table) {
            $table->string('thumb')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('edge_decors', function ($table) {
            $table->dropColumn('thumb');
        });
        Schema::table('decors', function ($table) {
            $table->dropColumn('thumb');
        });
    }
}
