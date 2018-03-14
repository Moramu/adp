<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corals', function (Blueprint $table) {
            $table->increments('id');
	    $table->integer('item_number');
    	    $table->string('name');
	    $table->string('photo')->default('no_image.jpg')->nullable();
	    $table->double('plastic_quantity')->nullable();
	    $table->double('cost_price')->nullable();
    	    $table->double('product_weight')->nullable();
	    $table->double('retail_price')->nullable();
	    $table->double('wholesale_price')->nullable();
	    $table->bigInteger('barcode')->nullable();
    	    $table->integer('blueridge')->nullable();
	    $table->integer('blue')->nullable();
	    $table->integer('brick')->nullable();
	    $table->integer('yellow')->nullable();
    	    $table->integer('dark_red')->nullable();
	    $table->integer('orange')->nullable();
	    $table->integer('green')->nullable();
	    $table->integer('turquoise')->nullable();
    	    $table->integer('purple')->nullable();
	    $table->integer('pink')->nullable();
	    $table->integer('mustard')->nullable();
	    $table->integer('summary')->nullable();
    	    $table->text('description')->nullable();
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
        Schema::dropIfExists('corals');
    }
}
