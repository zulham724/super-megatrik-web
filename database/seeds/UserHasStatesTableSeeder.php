<?php

use Illuminate\Database\Seeder;
use App\Models\Userstate;

class UserHasStatesTableSeeder extends Seeder
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
                "id"=>2,
                "user_id"=>2,
                "state_id"=>1,
                "is_active"=>1
            ],[
                "id"=>3,
                "user_id"=>3,
                "state_id"=>1,
                "is_active"=>1
            ],[
                "id"=>4,
                "user_id"=>4,
                "state_id"=>1,
                "is_active"=>0
            ],[
                "id"=>5,
                "user_id"=>5,
                "state_id"=>2,
                "is_active"=>1
            ],[
                "id"=>6,
                "user_id"=>6,
                "state_id"=>2,
                "is_active"=>0
            ]
        ];
        Userstate::insert($data);
    }
}
