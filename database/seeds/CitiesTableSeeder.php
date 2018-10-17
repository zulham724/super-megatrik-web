<?php

use Illuminate\Database\Seeder;
use App\Models\City;

class CitiesTableSeeder extends Seeder
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
                "state_id"=>1,
                "name"=>"City Sample 1",
                "description"=>"Deskripsi City 1"
            ],[
                "id"=>2,
                "state_id"=>2,
                "name"=>"City Sample 2",
                "description"=>"Deskripsi City 2"
            ]
        ];
        City::insert($data);
    }
}
