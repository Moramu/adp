<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	DB::table('roles')->insert([
	'name'=>'super_admin',
	'description'=>'test_super_admin'
	]);       
	DB::table('roles')->insert([
	'name'=>'admin',
	'description'=>'test_admin'
	]);       
	DB::table('users')->insert([
	'name'=>'sadmin',
	'email'=>'sadmin@sadmin.com',
	'password'=>'sadmin'
	]);       
	DB::table('users')->insert([
	'name'=>'admin',
	'email'=>'admin@admin.com',
	'password'=>'admin'
	]);
	DB::table('role_user')->insert([
	'role_id'=>'1',
	'user_id'=>'1'
	]);
	DB::table('role_user')->insert([
	'role_id'=>'2',
	'user_id'=>'2'
	]);
	
    }

}
