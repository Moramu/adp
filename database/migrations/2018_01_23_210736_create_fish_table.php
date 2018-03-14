<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFishTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fish', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_number');
	    $table->string('name')->nullable();
	    $table->string('photo')->default('no_image.jpg')->nullable();
	    $table->bigInteger('barcode')->nullable();
	    $table->string('type');
	    $table->string('category');
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
        Schema::dropIfExists('fish');
    }
}
