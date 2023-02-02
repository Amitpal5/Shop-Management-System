<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfitDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profit_details', function (Blueprint $table) {
            $table->id();
            $table->string('day');
            $table->string('month');
            $table->string('year');
            $table->string('name');
            $table->string('qty');
            $table->string('buying');
            $table->string('selling');
            $table->string('Amount');
            $table->string('profit');
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
        Schema::dropIfExists('profit_details');
    }
}
