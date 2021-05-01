<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DataTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('data_types')->delete();
        
        \DB::table('data_types')->insert(array (
            0 => 
            array (
                'controller' => 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController',
                'created_at' => '2021-02-22 01:56:09',
                'description' => '',
                'details' => NULL,
                'display_name_plural' => 'Users',
                'display_name_singular' => 'User',
                'generate_permissions' => 1,
                'icon' => 'voyager-person',
                'id' => 1,
                'model_name' => 'TCG\\Voyager\\Models\\User',
                'name' => 'users',
                'policy_name' => 'TCG\\Voyager\\Policies\\UserPolicy',
                'server_side' => 0,
                'slug' => 'users',
                'updated_at' => '2021-02-22 01:56:09',
            ),
            1 => 
            array (
                'controller' => '',
                'created_at' => '2021-02-22 01:56:09',
                'description' => '',
                'details' => NULL,
                'display_name_plural' => 'Menus',
                'display_name_singular' => 'Menu',
                'generate_permissions' => 1,
                'icon' => 'voyager-list',
                'id' => 2,
                'model_name' => 'TCG\\Voyager\\Models\\Menu',
                'name' => 'menus',
                'policy_name' => NULL,
                'server_side' => 0,
                'slug' => 'menus',
                'updated_at' => '2021-02-22 01:56:09',
            ),
            2 => 
            array (
                'controller' => 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController',
                'created_at' => '2021-02-22 01:56:09',
                'description' => '',
                'details' => NULL,
                'display_name_plural' => 'Roles',
                'display_name_singular' => 'Role',
                'generate_permissions' => 1,
                'icon' => 'voyager-lock',
                'id' => 3,
                'model_name' => 'TCG\\Voyager\\Models\\Role',
                'name' => 'roles',
                'policy_name' => NULL,
                'server_side' => 0,
                'slug' => 'roles',
                'updated_at' => '2021-02-22 01:56:09',
            ),
            3 => 
            array (
                'controller' => NULL,
                'created_at' => '2021-02-22 02:06:42',
                'description' => NULL,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null}',
                'display_name_plural' => 'Categories',
                'display_name_singular' => 'Category',
                'generate_permissions' => 1,
                'icon' => 'voyager-categories',
                'id' => 4,
                'model_name' => 'App\\Models\\Category',
                'name' => 'categories',
                'policy_name' => NULL,
                'server_side' => 0,
                'slug' => 'categories',
                'updated_at' => '2021-02-22 02:06:42',
            ),
            4 => 
            array (
                'controller' => 'App\\Http\\Controllers\\Voyager\\ProductsController',
                'created_at' => '2021-02-22 02:08:00',
                'description' => NULL,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'display_name_plural' => 'Products',
                'display_name_singular' => 'Product',
                'generate_permissions' => 1,
                'icon' => 'voyager-basket',
                'id' => 5,
                'model_name' => 'App\\Models\\Product',
                'name' => 'products',
                'policy_name' => NULL,
                'server_side' => 1,
                'slug' => 'products',
                'updated_at' => '2021-02-28 08:06:01',
            ),
            5 => 
            array (
                'controller' => 'App\\Http\\Controllers\\Voyager\\OrdersController',
                'created_at' => '2021-02-23 10:07:34',
                'description' => NULL,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'display_name_plural' => 'Orders',
                'display_name_singular' => 'Order',
                'generate_permissions' => 1,
                'icon' => 'voyager-documentation',
                'id' => 6,
                'model_name' => 'App\\Models\\Order',
                'name' => 'orders',
                'policy_name' => NULL,
                'server_side' => 1,
                'slug' => 'orders',
                'updated_at' => '2021-03-13 17:40:34',
            ),
            6 => 
            array (
                'controller' => 'App\\Http\\Controllers\\Voyager\\CouponsController',
                'created_at' => '2021-03-13 16:23:11',
                'description' => NULL,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'display_name_plural' => 'Coupons',
                'display_name_singular' => 'Coupon',
                'generate_permissions' => 1,
                'icon' => 'voyager-bolt',
                'id' => 7,
                'model_name' => 'App\\Models\\Coupon',
                'name' => 'coupons',
                'policy_name' => NULL,
                'server_side' => 0,
                'slug' => 'coupons',
                'updated_at' => '2021-03-13 17:01:33',
            ),
            7 => 
            array (
                'controller' => NULL,
                'created_at' => '2021-03-16 20:44:04',
                'description' => NULL,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'display_name_plural' => 'Home Banners',
                'display_name_singular' => 'Home Banner',
                'generate_permissions' => 1,
                'icon' => 'voyager-photo',
                'id' => 8,
                'model_name' => 'App\\Models\\HomeBanner',
                'name' => 'home_banners',
                'policy_name' => NULL,
                'server_side' => 1,
                'slug' => 'home-banners',
                'updated_at' => '2021-03-16 21:55:33',
            ),
        ));
        
        
    }
}