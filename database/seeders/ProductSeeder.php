<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->truncate();
        $product = [
            [
                'name' => 'Gray Shirt',
                'price' => 45.50,
                'image' => 'c_formal_gray_shirt.png',
                'status' => 1,
            ],
            [
                'name' => 'pant',
                'price' => 60,
                'image' => 'c_pant_girl.png',
                'status' => 1,
            ],
            [
                'name' => 'polo-shirt',
                'price' => 80,
                'image' => 'c_polo-shirt.png',
                'status' => 1,
            ],
            [
                'name' => 'shirt-girl',
                'price' => 100,
                'image' => 'c_shirt-girl.png',
                'status' => 1,
            ],
        ];
        DB::table('products')->insert($product);
    }
}
