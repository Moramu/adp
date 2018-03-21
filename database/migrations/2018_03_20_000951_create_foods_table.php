<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::create('foods', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('item_number');
        $table->string('name');
        $table->double('list_price');
        $table->double('extended_price');
        $table->integer('co_stock');
        $table->string('provider');
        $table->double('rtl_price');
        $table->double('whl_price');
        $table->integer('quantity')->default(0);
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
        Schema::dropIfExists('foods');
    }
}
