<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfitincomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profitincomes', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('month');
            $table->string('year');
            $table->string('product_id');
            $table->string('name');
            $table->string('qty');
            $table->string('Buyingprice');
            $table->string('sellingprice');
            $table->string('profit');
            $table->string('totalprofit');
            
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
        Schema::dropIfExists('profitincomes');
    }
}
