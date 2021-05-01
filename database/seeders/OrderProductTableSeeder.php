<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrderProductTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('order_product')->delete();
        
        \DB::table('order_product')->insert(array (
            0 => 
            array (
                'created_at' => NULL,
                'id' => 1,
                'order_id' => 1,
                'product_id' => 15,
                'quantity' => 2,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'created_at' => NULL,
                'id' => 2,
                'order_id' => 1,
                'product_id' => 32,
                'quantity' => 1,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'created_at' => NULL,
                'id' => 3,
                'order_id' => 2,
                'product_id' => 32,
                'quantity' => 1,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'created_at' => NULL,
                'id' => 4,
                'order_id' => 3,
                'product_id' => 2,
                'quantity' => 1,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'created_at' => NULL,
                'id' => 5,
                'order_id' => 4,
                'product_id' => 3,
                'quantity' => 1,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'created_at' => NULL,
                'id' => 6,
                'order_id' => 5,
                'product_id' => 1,
                'quantity' => 1,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'created_at' => NULL,
                'id' => 7,
                'order_id' => 5,
                'product_id' => 64,
                'quantity' => 1,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'created_at' => NULL,
                'id' => 8,
                'order_id' => 5,
                'product_id' => 65,
                'quantity' => 3,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'created_at' => NULL,
                'id' => 9,
                'order_id' => 5,
                'product_id' => 27,
                'quantity' => 1,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'created_at' => NULL,
                'id' => 10,
                'order_id' => 6,
                'product_id' => 1,
                'quantity' => 1,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'created_at' => NULL,
                'id' => 11,
                'order_id' => 7,
                'product_id' => 15,
                'quantity' => 1,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'created_at' => NULL,
                'id' => 12,
                'order_id' => 8,
                'product_id' => 1,
                'quantity' => 1,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'created_at' => NULL,
                'id' => 13,
                'order_id' => 9,
                'product_id' => 7,
                'quantity' => 1,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'created_at' => NULL,
                'id' => 14,
                'order_id' => 10,
                'product_id' => 24,
                'quantity' => 1,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'created_at' => NULL,
                'id' => 15,
                'order_id' => 11,
                'product_id' => 3,
                'quantity' => 1,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'created_at' => NULL,
                'id' => 16,
                'order_id' => 11,
                'product_id' => 21,
                'quantity' => 2,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}