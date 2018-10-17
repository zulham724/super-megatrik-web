<?php

use Illuminate\Database\Seeder;
use App\Models\Biodata;

class BiodatasTableSeeder extends Seeder
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
                "user_id"=>2,
                "first_name"=>"Operator",
                "last_name"=>"Owi",
                "birth_of_date"=>"1990-02-21"
            ],[
                "id"=>2,
                "user_id"=>3,
                "first_name"=>"Teknisi",
                "last_name"=>"Toni",
                "birth_of_date"=>"1991-06-30"
            ],[
                "id"=>3,
                "user_id"=>4,
                "first_name"=>"Teknisi",
                "last_name"=>"Tono",
                "birth_of_date"=>"1991-03-28"
            ],[
                "id"=>4,
                "user_id"=>5,
                "first_name"=>"Customer",
                "last_name"=>"Kusdi",
                "birth_of_date"=>"1982-01-11"
            ],[
                "id"=>5,
                "user_id"=>6,
                "first_name"=>"Customer",
                "last_name"=>"Kurni",
                "birth_of_date"=>"1986-02-21"
            ]
        ];
        Biodata::insert($data);
    }
}
