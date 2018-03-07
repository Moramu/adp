<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFishPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fish_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fish_id');
            $table->string('size_id');
            $table->double('price');
            $table->double('rtl_price');
            $table->double('wholesale_price');
            $table->double('special_price');
	    $table->integer('quantity');
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
        Schema::dropIfExists('fish_prices');
    }
}
