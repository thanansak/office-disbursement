<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //product_types
        DB::table('product_types')->insert([
            [
                'name' => 'เครื่องเขียน',
                'description' => '-',
                'slug' => 'เครื่องเขียน',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'อุปกรณ์อิเล็กทรอนิกส์',
                'description' => '-',
                'slug' => 'อุปกรณ์อิเล็กทรอนิกส์',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'อุปกรณ์คอมพิวเตอร์',
                'description' => '-',
                'slug' => 'อุปกรณ์คอมพิวเตอร์',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);

        //products
        DB::table('products')->insert([
            [
                'product_code' => 'P001',
                'name' => 'เมาส์',
                'description' => '-',
                'price' => '250',
                'unit' => 'ชิ้น',
                'limit' => '1',
                'slug' => 'เมาส์',
                'product_type_id' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'product_code' => 'P002',
                'name' => 'คีย์บอร์ด',
                'description' => '-',
                'price' => '400',
                'unit' => 'ชิ้น',
                'limit' => '1',
                'slug' => 'คีย์บอร์ด',
                'product_type_id' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'product_code' => 'P003',
                'name' => 'จอมอนิเตอร์',
                'description' => '-',
                'price' => '2500',
                'unit' => 'ชิ้น',
                'limit' => '100',
                'slug' => 'จอมอนิเตอร์',
                'product_type_id' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);


    }
}