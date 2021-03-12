<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menus')->delete();
        
        \DB::table('menus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'created_at' => '2021-02-22 01:56:09',
                'updated_at' => '2021-02-22 01:56:09',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'footer',
                'created_at' => '2021-02-22 02:16:57',
                'updated_at' => '2021-02-22 02:16:57',
            ),
        ));
        
        
    }
}