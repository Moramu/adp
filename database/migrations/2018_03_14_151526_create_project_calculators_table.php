<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectCalculatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_calculators', function (Blueprint $table) {
            $table->increments('id');
	    $table->string('name');
	    $table->integer('corals');
	    $table->integer('material');
	    $table->double('rtl_price');
	    $table->double('whl_price');
	    $table->double('description');
	    $table->string('user');
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
        Schema::dropIfExists('project_calculators');
    }
}
