<?php

use Illuminate\Database\Seeder;
use App\Models\State;

class StatesTableSeeder extends Seeder
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
                "name"=>"State Sample 1",
                "description"=>"Deskripsi State 1"
            ],[
                "id"=>2,
                "name"=>"State Sample 2",
                "description"=>"Deskripsi State 2"
            ]
        ];
        State::insert($data);
    }
}
