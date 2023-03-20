<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminMakeSeeder extends Seeder
{
   public function run(){
    DB::table('admin_registers')->delete();

    DB::table('admin_registers')->truncate();

    DB::table('admin_registers')->insert([
        [
            'first_name'       => 'Cao'                 ,
            'last_name'        => 'Nguyen'              ,
            'phone_number'     => '0783323888'          ,
            'email'            => 'nguyencv@gmail.com'  ,
            'password'         =>  bcrypt('123456')     ,
            'address'          => 'K196 Tran Cao Van'   ,
            'city'             => 'Da Nang'             ,
            'male'             =>  1                    ,
            'block'            =>  1                    ,
            'active'           =>  1                    ,
            'hash'             =>  '123456'             ,
        ],
    ]);
   }
}
