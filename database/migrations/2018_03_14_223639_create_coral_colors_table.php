<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoralColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coral_colors', function (Blueprint $table) {
            $table->increments('id');
	    $table->integer('coral_id')->default(0);
	    $table->integer('blueridge')->default(0);
	    $table->integer('blue')->default(0);
	    $table->integer('brick')->default(0);
	    $table->integer('yellow')->default(0);
	    $table->integer('dark_red')->default(0);
	    $table->integer('orange')->default(0);
	    $table->integer('green')->default(0);
	    $table->integer('turquoise')->default(0);
	    $table->integer('purple')->default(0);
	    $table->integer('pink')->default(0);
	    $table->integer('mustard')->default(0);
	    $table->integer('summary')->default(0);
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
        Schema::dropIfExists('coral_colors');
    }
}
