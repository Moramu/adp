<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFishSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fish_sizes', function (Blueprint $table) {
            $table->increments('id');
	    $table->integer('fId');
	    $table->string('js');
	    $table->string('s');
	    $table->string('sm');
	    $table->string('m');
	    $table->string('ml');
	    $table->string('l');
	    $table->string('xl');
	    $table->string('n/a');        
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
        Schema::dropIfExists('fish_sizes');
    }
}
