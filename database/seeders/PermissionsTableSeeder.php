<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'created_at' => '2021-02-22 01:56:09',
                'id' => 1,
                'key' => 'browse_admin',
                'table_name' => NULL,
                'updated_at' => '2021-02-22 01:56:09',
            ),
            1 => 
            array (
                'created_at' => '2021-02-22 01:56:09',
                'id' => 2,
                'key' => 'browse_bread',
                'table_name' => NULL,
                'updated_at' => '2021-02-22 01:56:09',
            ),
            2 => 
            array (
                'created_at' => '2021-02-22 01:56:09',
                'id' => 3,
                'key' => 'browse_database',
                'table_name' => NULL,
                'updated_at' => '2021-02-22 01:56:09',
            ),
            3 => 
            array (
                'created_at' => '2021-02-22 01:56:09',
                'id' => 4,
                'key' => 'browse_media',
                'table_name' => NULL,
                'updated_at' => '2021-02-22 01:56:09',
            ),
            4 => 
            array (
                'created_at' => '2021-02-22 01:56:09',
                'id' => 5,
                'key' => 'browse_compass',
                'table_name' => NULL,
                'updated_at' => '2021-02-22 01:56:09',
            ),
            5 => 
            array (
                'created_at' => '2021-02-22 01:56:09',
                'id' => 6,
                'key' => 'browse_menus',
                'table_name' => 'menus',
                'updated_at' => '2021-02-22 01:56:09',
            ),
            6 => 
            array (
                'created_at' => '2021-02-22 01:56:09',
                'id' => 7,
                'key' => 'read_menus',
                'table_name' => 'menus',
                'updated_at' => '2021-02-22 01:56:09',
            ),
            7 => 
            array (
                'created_at' => '2021-02-22 01:56:09',
                'id' => 8,
                'key' => 'edit_menus',
                'table_name' => 'menus',
                'updated_at' => '2021-02-22 01:56:09',
            ),
            8 => 
            array (
                'created_at' => '2021-02-22 01:56:09',
                'id' => 9,
                'key' => 'add_menus',
                'table_name' => 'menus',
                'updated_at' => '2021-02-22 01:56:09',
            ),
            9 => 
            array (
                'created_at' => '2021-02-22 01:56:09',
                'id' => 10,
                'key' => 'delete_menus',
                'table_name' => 'menus',
                'updated_at' => '2021-02-22 01:56:09',
            ),
            10 => 
            array (
                'created_at' => '2021-02-22 01:56:09',
                'id' => 11,
                'key' => 'browse_roles',
                'table_name' => 'roles',
                'updated_at' => '2021-02-22 01:56:09',
            ),
            11 => 
            array (
                'created_at' => '2021-02-22 01:56:09',
                'id' => 12,
                'key' => 'read_roles',
                'table_name' => 'roles',
                'updated_at' => '2021-02-22 01:56:09',
            ),
            12 => 
            array (
                'created_at' => '2021-02-22 01:56:09',
                'id' => 13,
                'key' => 'edit_roles',
                'table_name' => 'roles',
                'updated_at' => '2021-02-22 01:56:09',
            ),
            13 => 
            array (
                'created_at' => '2021-02-22 01:56:09',
                'id' => 14,
                'key' => 'add_roles',
                'table_name' => 'roles',
                'updated_at' => '2021-02-22 01:56:09',
            ),
            14 => 
            array (
                'created_at' => '2021-02-22 01:56:09',
                'id' => 15,
                'key' => 'delete_roles',
                'table_name' => 'roles',
                'updated_at' => '2021-02-22 01:56:09',
            ),
            15 => 
            array (
                'created_at' => '2021-02-22 01:56:09',
                'id' => 16,
                'key' => 'browse_users',
                'table_name' => 'users',
                'updated_at' => '2021-02-22 01:56:09',
            ),
            16 => 
            array (
                'created_at' => '2021-02-22 01:56:09',
                'id' => 17,
                'key' => 'read_users',
                'table_name' => 'users',
                'updated_at' => '2021-02-22 01:56:09',
            ),
            17 => 
            array (
                'created_at' => '2021-02-22 01:56:09',
                'id' => 18,
                'key' => 'edit_users',
                'table_name' => 'users',
                'updated_at' => '2021-02-22 01:56:09',
            ),
            18 => 
            array (
                'created_at' => '2021-02-22 01:56:09',
                'id' => 19,
                'key' => 'add_users',
                'table_name' => 'users',
                'updated_at' => '2021-02-22 01:56:09',
            ),
            19 => 
            array (
                'created_at' => '2021-02-22 01:56:09',
                'id' => 20,
                'key' => 'delete_users',
                'table_name' => 'users',
                'updated_at' => '2021-02-22 01:56:09',
            ),
            20 => 
            array (
                'created_at' => '2021-02-22 01:56:09',
                'id' => 21,
                'key' => 'browse_settings',
                'table_name' => 'settings',
                'updated_at' => '2021-02-22 01:56:09',
            ),
            21 => 
            array (
                'created_at' => '2021-02-22 01:56:09',
                'id' => 22,
                'key' => 'read_settings',
                'table_name' => 'settings',
                'updated_at' => '2021-02-22 01:56:09',
            ),
            22 => 
            array (
                'created_at' => '2021-02-22 01:56:09',
                'id' => 23,
                'key' => 'edit_settings',
                'table_name' => 'settings',
                'updated_at' => '2021-02-22 01:56:09',
            ),
            23 => 
            array (
                'created_at' => '2021-02-22 01:56:09',
                'id' => 24,
                'key' => 'add_settings',
                'table_name' => 'settings',
                'updated_at' => '2021-02-22 01:56:09',
            ),
            24 => 
            array (
                'created_at' => '2021-02-22 01:56:09',
                'id' => 25,
                'key' => 'delete_settings',
                'table_name' => 'settings',
                'updated_at' => '2021-02-22 01:56:09',
            ),
            25 => 
            array (
                'created_at' => '2021-02-22 02:06:42',
                'id' => 26,
                'key' => 'browse_categories',
                'table_name' => 'categories',
                'updated_at' => '2021-02-22 02:06:42',
            ),
            26 => 
            array (
                'created_at' => '2021-02-22 02:06:42',
                'id' => 27,
                'key' => 'read_categories',
                'table_name' => 'categories',
                'updated_at' => '2021-02-22 02:06:42',
            ),
            27 => 
            array (
                'created_at' => '2021-02-22 02:06:42',
                'id' => 28,
                'key' => 'edit_categories',
                'table_name' => 'categories',
                'updated_at' => '2021-02-22 02:06:42',
            ),
            28 => 
            array (
                'created_at' => '2021-02-22 02:06:42',
                'id' => 29,
                'key' => 'add_categories',
                'table_name' => 'categories',
                'updated_at' => '2021-02-22 02:06:42',
            ),
            29 => 
            array (
                'created_at' => '2021-02-22 02:06:42',
                'id' => 30,
                'key' => 'delete_categories',
                'table_name' => 'categories',
                'updated_at' => '2021-02-22 02:06:42',
            ),
            30 => 
            array (
                'created_at' => '2021-02-22 02:08:00',
                'id' => 31,
                'key' => 'browse_products',
                'table_name' => 'products',
                'updated_at' => '2021-02-22 02:08:00',
            ),
            31 => 
            array (
                'created_at' => '2021-02-22 02:08:00',
                'id' => 32,
                'key' => 'read_products',
                'table_name' => 'products',
                'updated_at' => '2021-02-22 02:08:00',
            ),
            32 => 
            array (
                'created_at' => '2021-02-22 02:08:00',
                'id' => 33,
                'key' => 'edit_products',
                'table_name' => 'products',
                'updated_at' => '2021-02-22 02:08:00',
            ),
            33 => 
            array (
                'created_at' => '2021-02-22 02:08:00',
                'id' => 34,
                'key' => 'add_products',
                'table_name' => 'products',
                'updated_at' => '2021-02-22 02:08:00',
            ),
            34 => 
            array (
                'created_at' => '2021-02-22 02:08:00',
                'id' => 35,
                'key' => 'delete_products',
                'table_name' => 'products',
                'updated_at' => '2021-02-22 02:08:00',
            ),
            35 => 
            array (
                'created_at' => '2021-02-23 10:07:34',
                'id' => 36,
                'key' => 'browse_orders',
                'table_name' => 'orders',
                'updated_at' => '2021-02-23 10:07:34',
            ),
            36 => 
            array (
                'created_at' => '2021-02-23 10:07:34',
                'id' => 37,
                'key' => 'read_orders',
                'table_name' => 'orders',
                'updated_at' => '2021-02-23 10:07:34',
            ),
            37 => 
            array (
                'created_at' => '2021-02-23 10:07:34',
                'id' => 38,
                'key' => 'edit_orders',
                'table_name' => 'orders',
                'updated_at' => '2021-02-23 10:07:34',
            ),
            38 => 
            array (
                'created_at' => '2021-02-23 10:07:34',
                'id' => 39,
                'key' => 'add_orders',
                'table_name' => 'orders',
                'updated_at' => '2021-02-23 10:07:34',
            ),
            39 => 
            array (
                'created_at' => '2021-02-23 10:07:34',
                'id' => 40,
                'key' => 'delete_orders',
                'table_name' => 'orders',
                'updated_at' => '2021-02-23 10:07:34',
            ),
            40 => 
            array (
                'created_at' => '2021-03-12 16:40:26',
                'id' => 41,
                'key' => 'browse_hooks',
                'table_name' => NULL,
                'updated_at' => '2021-03-12 16:40:26',
            ),
            41 => 
            array (
                'created_at' => '2021-03-13 16:23:12',
                'id' => 42,
                'key' => 'browse_coupons',
                'table_name' => 'coupons',
                'updated_at' => '2021-03-13 16:23:12',
            ),
            42 => 
            array (
                'created_at' => '2021-03-13 16:23:12',
                'id' => 43,
                'key' => 'read_coupons',
                'table_name' => 'coupons',
                'updated_at' => '2021-03-13 16:23:12',
            ),
            43 => 
            array (
                'created_at' => '2021-03-13 16:23:12',
                'id' => 44,
                'key' => 'edit_coupons',
                'table_name' => 'coupons',
                'updated_at' => '2021-03-13 16:23:12',
            ),
            44 => 
            array (
                'created_at' => '2021-03-13 16:23:12',
                'id' => 45,
                'key' => 'add_coupons',
                'table_name' => 'coupons',
                'updated_at' => '2021-03-13 16:23:12',
            ),
            45 => 
            array (
                'created_at' => '2021-03-13 16:23:12',
                'id' => 46,
                'key' => 'delete_coupons',
                'table_name' => 'coupons',
                'updated_at' => '2021-03-13 16:23:12',
            ),
            46 => 
            array (
                'created_at' => '2021-03-16 20:44:04',
                'id' => 47,
                'key' => 'browse_home_banners',
                'table_name' => 'home_banners',
                'updated_at' => '2021-03-16 20:44:04',
            ),
            47 => 
            array (
                'created_at' => '2021-03-16 20:44:04',
                'id' => 48,
                'key' => 'read_home_banners',
                'table_name' => 'home_banners',
                'updated_at' => '2021-03-16 20:44:04',
            ),
            48 => 
            array (
                'created_at' => '2021-03-16 20:44:04',
                'id' => 49,
                'key' => 'edit_home_banners',
                'table_name' => 'home_banners',
                'updated_at' => '2021-03-16 20:44:04',
            ),
            49 => 
            array (
                'created_at' => '2021-03-16 20:44:04',
                'id' => 50,
                'key' => 'add_home_banners',
                'table_name' => 'home_banners',
                'updated_at' => '2021-03-16 20:44:04',
            ),
            50 => 
            array (
                'created_at' => '2021-03-16 20:44:04',
                'id' => 51,
                'key' => 'delete_home_banners',
                'table_name' => 'home_banners',
                'updated_at' => '2021-03-16 20:44:04',
            ),
        ));
        
        
    }
}