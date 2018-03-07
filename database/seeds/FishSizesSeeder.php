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
        DB::table('fish_sizes')->insert(['size'=> 'js']);
    	DB::table('fish_sizes')->insert(['size'=> 's']);
        DB::table('fish_sizes')->insert(['size'=> 'sm']);
	DB::table('fish_sizes')->insert(['size'=> 'm']);
	DB::table('fish_sizes')->insert(['size'=> 'ml']);
	DB::table('fish_sizes')->insert(['size'=> 'l']);
	DB::table('fish_sizes')->insert(['size'=> 'xl']);
	DB::table('fish_sizes')->insert(['size'=> 'n_a']);
    }
}
