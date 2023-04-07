<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryMakeSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->delete();

        DB::table('categories')->truncate();

        DB::table('categories')->insert([
            ['name_category' => 'Trà Sữa', 'slug_category' => 'tra-sua', 'image_category' => '', 'id_category_root' => 0,'is_open' => 1 ],
            ['name_category' => 'Cà Phê', 'slug_category' => 'ca-phe', 'image_category' => '', 'id_category_root' => 0,'is_open' => 1 ],
            ['name_category' => 'Sữa chua', 'slug_category' => 'sua-chua', 'image_category' => '', 'id_category_root' => 0,'is_open' => 1 ],
            ['name_category' => 'Nước ép trái cây', 'slug_category' => 'nuoc-ep-trai-cay', 'image_category' => '', 'id_category_root' => 0,'is_open' => 1 ],
            ['name_category' => 'Thức uống khác', 'slug_category' => 'thuc-uong-khac', 'image_category' => '', 'id_category_root' => 0,'is_open' => 1 ],
            ['name_category' => 'Topping thêm', 'slug_category' => 'topping-them', 'image_category' => '', 'id_category_root' => 0,'is_open' => 1 ],

        ]);
    }
}
