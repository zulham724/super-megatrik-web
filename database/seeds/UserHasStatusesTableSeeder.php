<?php

use Illuminate\Database\Seeder;
use App\Models\UserStatus;

class UserHasStatusesTableSeeder extends Seeder
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
                "status_id"=>1,
                "is_active"=>1
            ],[
                "id"=>3,
                "user_id"=>3,
                "status_id"=>1,
                "is_active"=>1
            ],[
                "id"=>4,
                "user_id"=>4,
                "status_id"=>1,
                "is_active"=>0
            ],[
                "id"=>5,
                "user_id"=>5,
                "status_id"=>2,
                "is_active"=>1
            ],[
                "id"=>6,
                "user_id"=>6,
                "status_id"=>2,
                "is_active"=>0
            ]
        ];
        Userstatus::insert($data);
    }
}
