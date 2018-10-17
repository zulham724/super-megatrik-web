<?php

use Illuminate\Database\Seeder;
use App\Models\Materiallist;

class MaterialListsTableSeeder extends Seeder
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
                "material_category_id"=>1,
                "name"=>"Contoh Daftar Material 1",
                "description"=>"Deskripsi 1",
                "price"=>98000
            ],[
                "id"=>2,
                "material_category_id"=>2,
                "name"=>"Contoh Daftar Material 2",
                "description"=>"Deskripsi 2",
                "price"=>39000
            ],[
                "id"=>3,
                "material_category_id"=>3,
                "name"=>"Contoh Daftar Material 3",
                "description"=>"Deskripsi 3",
                "price"=>48000
            ],[
                "id"=>4,
                "material_category_id"=>1,
                "name"=>"Contoh Daftar Material 4",
                "description"=>"Deskripsi 4",
                "price"=>28000
            ],[
                "id"=>5,
                "material_category_id"=>2,
                "name"=>"Contoh Daftar Material 5",
                "description"=>"Deskripsi 5",
                "price"=>68000
            ],[
                "id"=>6,
                "material_category_id"=>3,
                "name"=>"Contoh Daftar Material 6",
                "description"=>"Deskripsi 6",
                "price"=>18000
            ]
        ];
        Materiallist::insert($data);
    }
}
