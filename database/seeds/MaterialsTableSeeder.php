<?php

use Illuminate\Database\Seeder;
use App\Models\Material;

class MaterialsTableSeeder extends Seeder
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
                "order_id"=>1,
                "material_list_id"=>1
            ],[
                "id"=>2,
                "order_id"=>1,
                "material_list_id"=>2
            ],[
                "id"=>3,
                "order_id"=>2,
                "material_list_id"=>3
            ],[
                "id"=>4,
                "order_id"=>2,
                "material_list_id"=>4
            ],[
                "id"=>5,
                "order_id"=>3,
                "material_list_id"=>5
            ],[
                "id"=>6,
                "order_id"=>3,
                "material_list_id"=>6
            ],[
                "id"=>7,
                "order_id"=>4,
                "material_list_id"=>1
            ],[
                "id"=>8,
                "order_id"=>4,
                "material_list_id"=>2
            ]
        ];
        Material::insert($data);
    }
}
