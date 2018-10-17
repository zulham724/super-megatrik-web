<?php

use Illuminate\Database\Seeder;
use App\Models\Content;

class ContentsTableSeeder extends Seeder
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
                "content_list_id"=>1,
                "name"=>"Contoh Content 1",
                "description"=>"Deskripsi 1",
                "image"=>"KJSDHF87345"
            ],[
                "id"=>2,
                "content_list_id"=>2,
                "name"=>"Contoh Content 2",
                "description"=>"Deskripsi 2",
                "image"=>"SDF453DF"
            ],[
                "id"=>3,
                "content_list_id"=>3,
                "name"=>"Contoh Content 3",
                "description"=>"Deskripsi 3",
                "image"=>"SDF343FD"
            ],[
                "id"=>4,
                "content_list_id"=>4,
                "name"=>"Contoh Content 4",
                "description"=>"Deskripsi 4",
                "image"=>"SDFS3345FH"
            ],[
                "id"=>5,
                "content_list_id"=>5,
                "name"=>"Contoh Content 5",
                "description"=>"Deskripsi 5",
                "image"=>"SDFH3345"
            ],[
                "id"=>6,
                "content_list_id"=>6,
                "name"=>"Contoh Content 6",
                "description"=>"Deskripsi 6",
                "image"=>"234DFG43"
            ]
        ];
        Content::insert($data);
    }
}
