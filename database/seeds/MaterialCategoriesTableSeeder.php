<?php

use Illuminate\Database\Seeder;
use App\Models\Materialcategory;

class MaterialCategoriesTableSeeder extends Seeder
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
        		"name"=>"Contoh Kategori Material 1",
        		"description"=>"Deskripsi 1"
        	],[
        		"id"=>2,
        		"name"=>"Contoh Kategori Material 2",
        		"description"=>"Deskripsi 2"
        	],[
        		"id"=>3,
        		"name"=>"Contoh Kategori Material 3",
        		"description"=>"Deskripsi 3"
        	]
        ];
    	Materialcategory::insert($data);
    }
}
