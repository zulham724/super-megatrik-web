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
                "name"=>"operator",
                "email"=>"operator@operator.com",
                "password"=>bcrypt("password")
            ],[
                "id"=>3,
                "role_id"=>3,
                "name"=>"technician1",
                "email"=>"technician1@technician1.com",
                "password"=>bcrypt("password")
            ],[
                "id"=>4,
                "role_id"=>3,
                "name"=>"technician2",
                "email"=>"technician2@technician2.com",
                "password"=>bcrypt("password")
            ],[
                "id"=>5,
                "role_id"=>4,
                "name"=>"customer1",
                "email"=>"customer1@customer1.com",
                "password"=>bcrypt("password")
            ],[
                "id"=>6,
                "role_id"=>4,
                "name"=>"customer2",
                "email"=>"customer2@customer2.com",
                "password"=>bcrypt("password")
            ]
        ];
        User::insert($data);
    }
}
