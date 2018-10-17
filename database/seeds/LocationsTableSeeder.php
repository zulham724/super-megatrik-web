<?php

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	[
        		"id"=>1,
        		"user_id"=>2,
        		"latitude"=>0,
        		"longitude"=>0,
        		"state_id"=>1,
        		"city_id"=>1,
        		"district_id"=>1
        	],[
        		"id"=>2,
        		"user_id"=>3,
        		"latitude"=>0,
        		"longitude"=>0,
        		"state_id"=>1,
        		"city_id"=>1,
        		"district_id"=>1
            ],[
        		"id"=>3,
        		"user_id"=>4,
        		"latitude"=>0,
        		"longitude"=>0,
        		"state_id"=>2,
        		"city_id"=>2,
        		"district_id"=>2
            ],[
        		"id"=>4,
        		"user_id"=>5,
        		"latitude"=>0,
        		"longitude"=>0,
        		"state_id"=>1,
        		"city_id"=>1,
        		"district_id"=>1
            ],[
        		"id"=>5,
        		"user_id"=>6,
        		"latitude"=>0,
        		"longitude"=>0,
        		"state_id"=>2,
        		"city_id"=>2,
        		"district_id"=>2
            ]
        ];
        Location::insert($data);
    }
}
