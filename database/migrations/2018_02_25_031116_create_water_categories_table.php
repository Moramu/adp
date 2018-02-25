<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWaterCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('water_type', function (Blueprint $table) {
            $table->increments('id');
	    $table->string('type');
            $table->timestamps();
        });
    

    
    
        Schema::create('fish_categories', function (Blueprint $table) {
            $table->increments('id');
	    $table->integer('type_id');
	    $table->string('category');	    
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
	Schema::dropIfExists('water_type');
        Schema::dropIfExists('fish_categories');
    }
}
