<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name'        => ['en'=>'T-shirt' ,'ar'=>'تيشيرت'],
            'slug'        => 't-shirt',
            'description' => ['en'=>'50% Cotton, 50% Polyester' ,'ar'=>'50٪ قطن ، 50٪ بوليستر'],
            'price'       => '12',
            'quantity'    => '50',
            'image_path'  => 'images/products/LSc40fRGqbKwJI8Ah1puKZ4xooyujaULhekQVvLP.jpg',
            'category_id' => '4',
        ]);
        Product::create([
            'name'        => ['en'=>'bag' ,'ar'=>'حقيبة'],
            'slug'        => 'bag',
            'description' => ['en'=>'bag' ,'ar'=>'حقيبه جلد اصلي'],
            'price'       => '22.0',
            'quantity'    => '10',
            'image_path'  => 'images/products/fashion_08.jpg',
            'category_id' => '4',
        ]);
        Product::create([
            'name'        => ['en'=>'Laptop' ,'ar'=>'لابتوب'],
            'slug'        => 'laptop',
            'description' => ['en'=>'laptop g10' ,'ar'=>'لابتوب الجيل العاشر'],
            'price'       => '1199.9',
            'quantity'    => '5',
            'image_path'  => 'images/products/digital_4.jpg',
            'category_id' => '1',
        ]);
        Product::create([
            'name'        => ['en'=>'Hydphone' ,'ar'=>'هيدفون'],
            'slug'        => 'hydphone',
            'description' => ['en'=>'white Hydphone' ,'ar'=>'هيدفون ابيض'],
            'price'       => '8.5',
            'quantity'    => '30',
            'image_path'  => 'images/products/digital_13.jpg',
            'category_id' => '1',
        ]);

        Product::create([
            'name'        => ['en'=>'wooden bed' ,'ar'=>'سرير خشبي'],
            'slug'        => 'wooden-bed',
            'description' => ['en'=>'Made of beech wood' ,'ar'=>'مصنوع من خشب زان'],
            'price'       => '5000.0',
            'quantity'    => '5',
            'image_path'  => 'images/products/furniture_06.jpg',
            'category_id' => '5',
        ]);



    }
}
