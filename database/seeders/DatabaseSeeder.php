<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $this->call(AdminMakeSeeder::class);
        $this->call(CategoryMakeSeeder::class);
        $this->call(ProductMakeSeeder::class);
        Schema::enableForeignKeyConstraints();


    }
}
