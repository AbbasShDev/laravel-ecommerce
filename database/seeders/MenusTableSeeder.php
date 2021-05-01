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
                'created_at' => '2021-02-22 01:56:09',
                'id' => 1,
                'name' => 'admin',
                'updated_at' => '2021-02-22 01:56:09',
            ),
            1 => 
            array (
                'created_at' => '2021-02-22 02:16:57',
                'id' => 3,
                'name' => 'footer',
                'updated_at' => '2021-02-22 02:16:57',
            ),
        ));
        
        
    }
}