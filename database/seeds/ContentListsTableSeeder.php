<?php

use Illuminate\Database\Seeder;
use App\Models\Contentlist;

class ContentListsTableSeeder extends Seeder
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
                "content_category_id"=>1,
                "name"=>"Contoh Daftar Content 1",
                "description"=>"Deskripsi 1",
            ],[
                "id"=>2,
                "content_category_id"=>2,
                "name"=>"Contoh Daftar Content 2",
                "description"=>"Deskripsi 2",
            ],[
                "id"=>3,
                "content_category_id"=>3,
                "name"=>"Contoh Daftar Content 3",
                "description"=>"Deskripsi 3",
            ],[
                "id"=>4,
                "content_category_id"=>1,
                "name"=>"Contoh Daftar Content 4",
                "description"=>"Deskripsi 4",
            ],[
                "id"=>5,
                "content_category_id"=>2,
                "name"=>"Contoh Daftar Content 5",
                "description"=>"Deskripsi 5",
            ],[
                "id"=>6,
                "content_category_id"=>3,
                "name"=>"Contoh Daftar Content 6",
                "description"=>"Deskripsi 6",
            ]
        ];
        Contentlist::insert($data);
    }
}
