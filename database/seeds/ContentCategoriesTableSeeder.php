<?php

use Illuminate\Database\Seeder;
use App\Models\Contentcategory;

class ContentCategoriesTableSeeder extends Seeder
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
        		"name"=>"Contoh Kategori Content 1",
        		"description"=>"Deskripsi 1"
        	],[
        		"id"=>2,
        		"name"=>"Contoh Kategori Content 2",
        		"description"=>"Deskripsi 2"
        	],[
        		"id"=>3,
        		"name"=>"Contoh Kategori Content 3",
        		"description"=>"Deskripsi 3"
        	]
        ];
    	Contentcategory::insert($data);
    }
}
