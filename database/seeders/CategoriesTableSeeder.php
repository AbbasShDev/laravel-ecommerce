<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'created_at' => '2021-03-12 16:33:58',
                'id' => 1,
                'name' => 'Laptops',
                'slug' => 'laptops',
                'updated_at' => '2021-03-12 16:33:58',
            ),
            1 => 
            array (
                'created_at' => '2021-03-12 16:33:58',
                'id' => 2,
                'name' => 'Desktops',
                'slug' => 'desktops',
                'updated_at' => '2021-03-12 16:33:58',
            ),
            2 => 
            array (
                'created_at' => '2021-03-12 16:33:58',
                'id' => 3,
                'name' => 'Phones',
                'slug' => 'phones',
                'updated_at' => '2021-03-12 16:33:58',
            ),
            3 => 
            array (
                'created_at' => '2021-03-12 16:33:58',
                'id' => 4,
                'name' => 'Tablets',
                'slug' => 'tablets',
                'updated_at' => '2021-03-12 16:33:58',
            ),
            4 => 
            array (
                'created_at' => '2021-03-12 16:33:58',
                'id' => 5,
                'name' => 'TVs',
                'slug' => 'tvs',
                'updated_at' => '2021-03-12 16:33:58',
            ),
            5 => 
            array (
                'created_at' => '2021-03-12 16:33:58',
                'id' => 6,
                'name' => 'Digital cameras',
                'slug' => 'digital-cameras',
                'updated_at' => '2021-03-12 16:33:58',
            ),
            6 => 
            array (
                'created_at' => '2021-03-12 16:33:58',
                'id' => 7,
                'name' => 'Appliances',
                'slug' => 'appliances',
                'updated_at' => '2021-03-12 16:33:58',
            ),
            7 => 
            array (
                'created_at' => '2021-03-16 21:18:31',
                'id' => 8,
                'name' => 'Headphones',
                'slug' => 'headphones',
                'updated_at' => '2021-03-16 21:18:31',
            ),
            8 => 
            array (
                'created_at' => '2021-03-16 21:19:43',
                'id' => 9,
                'name' => 'Smart watches ',
                'slug' => 'smart-watches',
                'updated_at' => '2021-03-16 21:19:43',
            ),
            9 => 
            array (
                'created_at' => '2021-03-16 21:20:29',
                'id' => 10,
                'name' => 'Speakers',
                'slug' => 'speakers',
                'updated_at' => '2021-03-16 21:20:29',
            ),
        ));
        
        
    }
}