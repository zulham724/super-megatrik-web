<?php

use Illuminate\Database\Seeder;
use App\Models\Orderstatus;

class OrderStatusesTableSeeder extends Seeder
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
        		"order_id"=>1,
        		"is_accepted"=>0,
        		"is_completed"=>0
        	],[
        		"id"=>2,
        		"order_id"=>2,
        		"is_accepted"=>1,
        		"is_completed"=>0
        	],[
        		"id"=>3,
        		"order_id"=>3,
        		"is_accepted"=>1,
        		"is_completed"=>0
        	],[
        		"id"=>4,
        		"order_id"=>4,
        		"is_accepted"=>1,
        		"is_completed"=>1
        	]
        ];
    	Orderstatus::insert($data);
    }
}
