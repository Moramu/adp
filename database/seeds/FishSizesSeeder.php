<?php

use Illuminate\Database\Seeder;

class FishSizesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           DB::table('fish_sizes')->insert([
            'fish_id' => 1,
	    'js' => 2,
	    's' => 0,
	    'sm' => 0,
	    'm' => 0,
	    'ml' => 0,
	    'l' => 0,
	    'xl' => 0,
	    'n/a' => 0
        ]);
            DB::table('fish_sizes')->insert([
            'fish_id' => 2,
	    'js' => 2,
	    's' => 0,
	    'sm' => 1,
	    'm' => 0,
	    'ml' => 3,
	    'l' => 0,
	    'xl' => 0,
	    'n/a' => 0
        ]);
    }
}
