<?php

use Illuminate\Database\Seeder;

class WaterCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('water_type')->insert([
            'type' => 'fresh_water'
            ]);
          DB::table('water_type')->insert([
            'type' => 'salt_water'
            ]);
           DB::table('fish_categories')->insert([
            'type_id' => 1,
            'category' => 'cichlids'
            ]);
            DB::table('fish_categories')->insert([
            'type_id' => 2,
            'category' => 'lionfish'
        ]);
    }
}
