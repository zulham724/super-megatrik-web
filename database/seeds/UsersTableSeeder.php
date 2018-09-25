<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;
use App\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\User');
        $data = [
        	[
        		"id"=>1,
        		"role_id"=>1,
        		"name"=>"admin",
        		"email"=>"admin@admin.com",
        		"password"=>bcrypt("password")
        	],[
        		"id"=>2,
        		"role_id"=>2,
        		"name"=>"technician",
        		"email"=>"technician@technician.com",
        		"password"=>bcrypt("password")
        	]
        ];
        User::insert($data);
    }
}
