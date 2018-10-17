<?php

use Illuminate\Database\Seeder;
use App\Models\Transactionstatus;

class TransactionStatusesTableSeeder extends Seeder
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
        		"transaction_id"=>1,
        		"is_paid"=>0
        	],[
        		"id"=>2,
        		"transaction_id"=>2,
        		"is_paid"=>0
        	],[
        		"id"=>3,
        		"transaction_id"=>3,
        		"is_paid"=>1
        	],[
        		"id"=>4,
        		"transaction_id"=>4,
        		"is_paid"=>1
        	]
        ];
        Transactionstatus::insert($data);
    }
}
