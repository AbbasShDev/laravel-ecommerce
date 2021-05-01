<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'created_at' => '2021-02-22 01:56:09',
                'display_name' => 'Administrator',
                'id' => 1,
                'name' => 'admin',
                'updated_at' => '2021-02-22 01:56:09',
            ),
            1 => 
            array (
                'created_at' => '2021-02-22 01:56:09',
                'display_name' => 'Normal User',
                'id' => 2,
                'name' => 'user',
                'updated_at' => '2021-02-22 01:56:09',
            ),
            2 => 
            array (
                'created_at' => '2021-03-13 22:48:31',
                'display_name' => 'editor',
                'id' => 3,
                'name' => 'editor',
                'updated_at' => '2021-03-13 22:48:31',
            ),
            3 => 
            array (
                'created_at' => '2021-03-13 22:51:47',
                'display_name' => 'Demo',
                'id' => 4,
                'name' => 'Demo',
                'updated_at' => '2021-03-13 22:51:47',
            ),
        ));
        
        
    }
}