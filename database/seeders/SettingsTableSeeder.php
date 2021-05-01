<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'details' => '',
                'display_name' => 'Site Title',
                'group' => 'Site',
                'id' => 1,
                'key' => 'site.title',
                'order' => 1,
                'type' => 'text',
                'value' => 'Site Title',
            ),
            1 => 
            array (
                'details' => '',
                'display_name' => 'Site Description',
                'group' => 'Site',
                'id' => 2,
                'key' => 'site.description',
                'order' => 2,
                'type' => 'text',
                'value' => 'Site Description',
            ),
            2 => 
            array (
                'details' => '',
                'display_name' => 'Site Logo',
                'group' => 'Site',
                'id' => 3,
                'key' => 'site.logo',
                'order' => 3,
                'type' => 'image',
                'value' => '',
            ),
            3 => 
            array (
                'details' => '',
                'display_name' => 'Google Analytics Tracking ID',
                'group' => 'Site',
                'id' => 4,
                'key' => 'site.google_analytics_tracking_id',
                'order' => 4,
                'type' => 'text',
                'value' => NULL,
            ),
            4 => 
            array (
                'details' => '',
                'display_name' => 'Admin Background Image',
                'group' => 'Admin',
                'id' => 5,
                'key' => 'admin.bg_image',
                'order' => 5,
                'type' => 'image',
                'value' => 'settings/March2021/ksO6rBNJEp8db7NQhFVD.png',
            ),
            5 => 
            array (
                'details' => '',
                'display_name' => 'Admin Title',
                'group' => 'Admin',
                'id' => 6,
                'key' => 'admin.title',
                'order' => 1,
                'type' => 'text',
                'value' => 'Laramerce',
            ),
            6 => 
            array (
                'details' => '',
                'display_name' => 'Admin Description',
                'group' => 'Admin',
                'id' => 7,
                'key' => 'admin.description',
                'order' => 2,
                'type' => 'text',
                'value' => 'Welcome to Laramerce. The Laravel E-commerce',
            ),
            7 => 
            array (
                'details' => '',
                'display_name' => 'Admin Loader',
                'group' => 'Admin',
                'id' => 8,
                'key' => 'admin.loader',
                'order' => 3,
                'type' => 'image',
                'value' => 'settings/March2021/P6IawzWla01z6iX9HQKE.png',
            ),
            8 => 
            array (
                'details' => '',
                'display_name' => 'Admin Icon Image',
                'group' => 'Admin',
                'id' => 9,
                'key' => 'admin.icon_image',
                'order' => 4,
                'type' => 'image',
                'value' => 'settings/March2021/xZv0SlItbeCReT6tI4Xe.png',
            ),
            9 => 
            array (
                'details' => '',
            'display_name' => 'Google Analytics Client ID (used for admin dashboard)',
                'group' => 'Admin',
                'id' => 10,
                'key' => 'admin.google_analytics_client_id',
                'order' => 1,
                'type' => 'text',
                'value' => NULL,
            ),
            10 => 
            array (
                'details' => NULL,
                'display_name' => 'Stock Threshold',
                'group' => 'Site',
                'id' => 11,
                'key' => 'site.stock_threshold',
                'order' => 6,
                'type' => 'text',
                'value' => '10',
            ),
        ));
        
        
    }
}