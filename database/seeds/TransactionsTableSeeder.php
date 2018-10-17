<?php

use Illuminate\Database\Seeder;
use App\Models\Transaction;

class TransactionsTableSeeder extends Seeder
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
        		"transaction_number"=>"56543KJHKDS",
        		"total"=>"20000"
        	],[
        		"id"=>2,
        		"order_id"=>2,
        		"transaction_number"=>"KSDFH394LDSF",
        		"total"=>"87000"
        	],[
        		"id"=>3,
        		"order_id"=>3,
        		"transaction_number"=>"DFGDF234SD",
        		"total"=>"37000"
        	],[
        		"id"=>4,
        		"order_id"=>4,
        		"transaction_number"=>"23SDFSDF34",
        		"total"=>"97000"
        	]
        ];
        Transaction::insert($data);
    }
}
