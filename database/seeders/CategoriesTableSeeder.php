<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

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
            'name' => [
                'en' => 'Laptops',
                'ar'=> 'لابتوبات',
            ],
        ]);

        Category::create([
            'name' => [
                'en' => 'Desktops',
                'ar'=> 'كمبيوترات مكتبية',
            ],
        ]);

        Category::create([
            'name' => [
                'en' => 'Phones',
                'ar'=> 'جوالات',
            ],
        ]);

        Category::create([
            'name' => [
                'en' => 'Tablets',
                'ar'=> 'تابلت',
            ],
        ]);

        Category::create([
            'name' => [
                'en' => 'TVs',
                'ar'=> 'تلفزيونات',
            ],
        ]);

        Category::create([
            'name' => [
                'en' => 'Digital cameras',
                'ar'=> 'كاميرات',
            ],
        ]);

        Category::create([
            'name' => [
                'en' => 'Appliances',
                'ar'=> 'الاجهزة المنزلية',
            ],
        ]);


    }
}
