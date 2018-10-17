<?php

use Illuminate\Database\Seeder;

// 
use Laracasts\TestDummy\Factory as TestDummy;
use App\Role;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Role');
        $data = [
        	[
        		"id"=>1,
        		"name"=>"admin",
        		"description"=>"admin user"
        	],[
                "id"=>2,
                "name"=>"operator",
                "description"=>"operator user"
            ],[
                "id"=>3,
                "name"=>"technician",
                "description"=>"technician user"
            ],[
                "id"=>4,
                "name"=>"customer",
                "description"=>"customer user"
            ]
        ];
    	Role::insert($data);
    }
}
