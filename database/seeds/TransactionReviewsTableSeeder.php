<?php

use Illuminate\Database\Seeder;
use App\Models\TransactionReview;

class TransactionReviewsTableSeeder extends Seeder
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
                "value"=>1,
                "description"=>"Mantap"
        	],[
        		"id"=>2,
        		"transaction_id"=>2,
                "value"=>3,
                "description"=>"Mantap"
        	],[
        		"id"=>3,
        		"transaction_id"=>3,
                "value"=>2,
                "description"=>"Mantap"
        	],[
        		"id"=>4,
        		"transaction_id"=>4,
                "value"=>4,
                "description"=>"Mantap"
        	]
        ];
        TransactionReview::insert($data);
    }
}
