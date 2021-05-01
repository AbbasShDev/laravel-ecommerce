<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CouponsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('coupons')->delete();
        
        \DB::table('coupons')->insert(array (
            0 => 
            array (
                'code' => 'ABC123',
                'created_at' => '2021-03-12 16:34:10',
                'expire_at' => NULL,
                'id' => 1,
                'percent_off' => NULL,
                'start_at' => NULL,
                'type' => 'fixed',
                'updated_at' => '2021-03-12 16:34:10',
                'value' => 3000,
            ),
            1 => 
            array (
                'code' => 'DEF456',
                'created_at' => '2021-03-12 16:34:10',
                'expire_at' => NULL,
                'id' => 2,
                'percent_off' => 50,
                'start_at' => NULL,
                'type' => 'percent',
                'updated_at' => '2021-03-12 16:34:10',
                'value' => NULL,
            ),
            2 => 
            array (
                'code' => 'dddd',
                'created_at' => '2021-03-13 16:45:17',
                'expire_at' => '2021-03-12 19:43:00',
                'id' => 3,
                'percent_off' => NULL,
                'start_at' => '2021-03-10 19:43:00',
                'type' => 'fixed',
                'updated_at' => '2021-03-13 16:45:17',
                'value' => 13,
            ),
            3 => 
            array (
                'code' => 'start',
                'created_at' => '2021-03-13 16:57:52',
                'expire_at' => '2021-03-16 19:57:00',
                'id' => 4,
                'percent_off' => NULL,
                'start_at' => '2021-03-14 19:57:00',
                'type' => 'fixed',
                'updated_at' => '2021-03-13 16:58:46',
                'value' => 25,
            ),
            4 => 
            array (
                'code' => 'valid',
                'created_at' => '2021-03-13 16:58:13',
                'expire_at' => '2021-03-18 19:58:00',
                'id' => 5,
                'percent_off' => NULL,
                'start_at' => '2021-03-12 19:58:00',
                'type' => 'fixed',
                'updated_at' => '2021-03-13 16:58:34',
                'value' => 25,
            ),
            5 => 
            array (
                'code' => 'new',
                'created_at' => '2021-03-13 17:02:11',
                'expire_at' => '2021-03-15 20:02:00',
                'id' => 6,
                'percent_off' => NULL,
                'start_at' => '2021-03-13 20:02:00',
                'type' => 'fixed',
                'updated_at' => '2021-03-13 17:02:11',
                'value' => 2500,
            ),
            6 => 
            array (
                'code' => 'fixed10',
                'created_at' => '2021-03-24 03:08:43',
                'expire_at' => '2021-09-30 06:08:00',
                'id' => 7,
                'percent_off' => NULL,
                'start_at' => '2021-03-22 06:08:00',
                'type' => 'fixed',
                'updated_at' => '2021-03-24 03:09:20',
                'value' => 100000,
            ),
        ));
        
        
    }
}