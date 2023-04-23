<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         for($i=0;$i<10;$i++)

        {
            DB::table('products')->insert([
                'name'=> Str::random(10),
                'category_id' => '7',
                'price'=> '1000',
                'quantity'=>'10',
                'description'=> 'hvuwhbjbuihivuh',
                'received_date'=> now(),

            ]);
       }
    }   

}
