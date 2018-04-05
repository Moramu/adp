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
	    $table->integer('material_id');
	    $table->json('corals_id');
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
