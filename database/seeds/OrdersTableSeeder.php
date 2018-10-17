<?php

use Illuminate\Database\Seeder;
use App\Models\Order;

class OrdersTableSeeder extends Seeder
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
        		"technician_id"=>"2",
        		"customer_id"=>"5",
        		"order_start"=>"2017-12-11",
        		"order_end"=>"2017-12-21"
        	],[
        		"id"=>2,
        		"technician_id"=>"2",
        		"customer_id"=>"6",
        		"order_start"=>"2017-12-11",
        		"order_end"=>"2017-12-21"
        	],[
        		"id"=>3,
        		"technician_id"=>"3",
        		"customer_id"=>"5",
        		"order_start"=>"2017-12-11",
        		"order_end"=>"2017-12-21"
        	],[
        		"id"=>4,
        		"technician_id"=>"3",
        		"customer_id"=>"6",
        		"order_start"=>"2017-12-11",
        		"order_end"=>"2017-12-21"
        	]
        ];
    	Order::insert($data);
    }
}
