<?php

use Illuminate\Database\Seeder;
use App\Models\District;

class DistrictsTableSeeder extends Seeder
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
                "city_id"=>1,
                "name"=>"District Sample 1",
                "description"=>"Deskripsi District 1"
            ],[
                "id"=>2,
                "city_id"=>2,
                "name"=>"District Sample 2",
                "description"=>"Deskripsi District 2"
            ]
        ];
        District::insert($data);
    }
}
