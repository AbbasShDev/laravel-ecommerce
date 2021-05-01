<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HomeBannersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('home_banners')->delete();
        
        \DB::table('home_banners')->insert(array (
            0 => 
            array (
                'created_at' => '2021-03-16 21:34:00',
                'id' => 7,
                'image' => 'home-banners/March2021/1vxyqNjSWCwVwNOYyYiL.jpg',
                'product_id' => 65,
                'product_name' => 'Sony ZX Series',
                'product_price_description' => 'Starting from $73.00',
                'product_stock_status' => 'In stock',
                'text_color' => 'black',
                'updated_at' => '2021-03-16 21:51:57',
            ),
            1 => 
            array (
                'created_at' => '2021-03-16 21:35:58',
                'id' => 8,
                'image' => 'home-banners/March2021/DUo1KlHTA2SIQpVSQbMX.jpg',
                'product_id' => 64,
                'product_name' => 'Apple Watch',
                'product_price_description' => 'Starting from $800.00',
                'product_stock_status' => 'limited offer',
                'text_color' => 'white',
                'updated_at' => '2021-03-16 21:35:58',
            ),
            2 => 
            array (
                'created_at' => '2021-03-16 21:38:20',
                'id' => 9,
                'image' => 'home-banners/March2021/aBYCjcB3VaCrJ2uZdzx9.png',
                'product_id' => 19,
                'product_name' => 'Mobile Phones',
                'product_price_description' => 'Starting from $600.00',
                'product_stock_status' => 'sales on mobile Phones',
                'text_color' => 'white',
                'updated_at' => '2021-03-16 21:38:20',
            ),
            3 => 
            array (
                'created_at' => '2021-03-16 21:39:00',
                'id' => 10,
                'image' => 'home-banners/March2021/XIKXrUdeZkBHqxCAMaYU.jpg',
                'product_id' => 66,
                'product_name' => 'blutooth speaker',
                'product_price_description' => 'Starting from $30.00',
                'product_stock_status' => 'new in stock',
                'text_color' => 'white',
                'updated_at' => '2021-03-16 21:56:52',
            ),
        ));
        
        
    }
}