<?php

use Illuminate\Database\Seeder;
use App\Models\Servicelist;

class ServiceListsTableSeeder extends Seeder
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
                "service_category_id"=>1,
                "name"=>"Contoh Daftar Servis 1",
                "description"=>"Deskripsi 1",
                "price"=>98000
            ],[
                "id"=>2,
                "service_category_id"=>2,
                "name"=>"Contoh Daftar Servis 2",
                "description"=>"Deskripsi 2",
                "price"=>39000
            ],[
                "id"=>3,
                "service_category_id"=>3,
                "name"=>"Contoh Daftar Servis 3",
                "description"=>"Deskripsi 3",
                "price"=>48000
            ],[
                "id"=>4,
                "service_category_id"=>1,
                "name"=>"Contoh Daftar Servis 4",
                "description"=>"Deskripsi 4",
                "price"=>28000
            ],[
                "id"=>5,
                "service_category_id"=>2,
                "name"=>"Contoh Daftar Servis 5",
                "description"=>"Deskripsi 5",
                "price"=>68000
            ],[
                "id"=>6,
                "service_category_id"=>3,
                "name"=>"Contoh Daftar Servis 6",
                "description"=>"Deskripsi 6",
                "price"=>18000
            ]
        ];
        Servicelist::insert($data);
    }
}
