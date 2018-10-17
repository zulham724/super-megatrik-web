<?php

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusesTableSeeder extends Seeder
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
                "name"=>"Status Sample 1",
                "description"=>"Deskripsi Status 1"
            ],[
                "id"=>2,
                "name"=>"Status Sample 2",
                "description"=>"Deskripsi Status 2"
            ]
        ];
        Status::insert($data);
    }
}
