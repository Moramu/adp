<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReefsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reefs', function (Blueprint $table) {
            $table->increments('id');
	    $table->string('name');
	    $table->integer('material_id');
	    $table->double('m_quantity');
	    $table->double('m_price');
	    $table->double('m_price_rtl');
	    $table->double('m_price_whl');
	    $table->json('coral_id');
	    $table->json('c_quantity');
	    $table->integer('c_sum_quantity');
	    $table->double('reef_sum_rtl');
	    $table->double('reef_sum_whl');
	    $table->string('username');
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
        Schema::dropIfExists('reefs');
    }
}
