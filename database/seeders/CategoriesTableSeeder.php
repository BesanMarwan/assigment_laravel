<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => ['en'=>'Electronic' ,'ar'=>'الكترونيات'],
            'slug' => 'electronic',
        ]);
        Category::create([
            'name' => ['en'=>'Watches' ,'ar'=>'ساعات'],
            'slug' => 'watches',
        ]);
        Category::create([
            'name' => ['en'=>'Toys' ,'ar'=>'ألعاب'],
            'slug' => 'toys',
        ]);
        Category::create([
            'name' => ['en'=>'Fashion' ,'ar'=>'أزياء'],
            'slug' => 'fashion',
        ]);

        Category::create([
             'name' => ['en'=>'Furniture' ,'ar'=>'أثاث'],
            'slug' => 'furniture',
        ]);
        Category::create([
            'name' => ['en'=>'Gift' ,'ar'=>'هدايا'],
            'slug' => 'gift',
        ]);
    }
}
