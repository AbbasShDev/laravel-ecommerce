<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenuItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menu_items')->delete();
        
        \DB::table('menu_items')->insert(array (
            0 => 
            array (
                'id' => 1,
                'menu_id' => 1,
                'title' => 'Dashboard',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-boat',
                'color' => NULL,
                'parent_id' => NULL,
                'order' => 1,
                'created_at' => '2021-02-22 01:56:09',
                'updated_at' => '2021-02-22 01:56:09',
                'route' => 'voyager.dashboard',
                'parameters' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'menu_id' => 1,
                'title' => 'Media',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-images',
                'color' => NULL,
                'parent_id' => NULL,
                'order' => 7,
                'created_at' => '2021-02-22 01:56:09',
                'updated_at' => '2021-02-23 10:16:43',
                'route' => 'voyager.media.index',
                'parameters' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'menu_id' => 1,
                'title' => 'Users',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-person',
                'color' => NULL,
                'parent_id' => NULL,
                'order' => 3,
                'created_at' => '2021-02-22 01:56:09',
                'updated_at' => '2021-02-23 10:16:50',
                'route' => 'voyager.users.index',
                'parameters' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'menu_id' => 1,
                'title' => 'Roles',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-lock',
                'color' => NULL,
                'parent_id' => NULL,
                'order' => 6,
                'created_at' => '2021-02-22 01:56:09',
                'updated_at' => '2021-02-23 10:16:47',
                'route' => 'voyager.roles.index',
                'parameters' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'menu_id' => 1,
                'title' => 'Tools',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-tools',
                'color' => NULL,
                'parent_id' => NULL,
                'order' => 8,
                'created_at' => '2021-02-22 01:56:09',
                'updated_at' => '2021-02-23 10:16:43',
                'route' => NULL,
                'parameters' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'menu_id' => 1,
                'title' => 'Menu Builder',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-list',
                'color' => NULL,
                'parent_id' => 5,
                'order' => 1,
                'created_at' => '2021-02-22 01:56:09',
                'updated_at' => '2021-02-22 02:11:57',
                'route' => 'voyager.menus.index',
                'parameters' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'menu_id' => 1,
                'title' => 'Database',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-data',
                'color' => NULL,
                'parent_id' => 5,
                'order' => 2,
                'created_at' => '2021-02-22 01:56:09',
                'updated_at' => '2021-02-22 02:11:57',
                'route' => 'voyager.database.index',
                'parameters' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'menu_id' => 1,
                'title' => 'Compass',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-compass',
                'color' => NULL,
                'parent_id' => 5,
                'order' => 3,
                'created_at' => '2021-02-22 01:56:09',
                'updated_at' => '2021-02-22 02:11:57',
                'route' => 'voyager.compass.index',
                'parameters' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'menu_id' => 1,
                'title' => 'BREAD',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-bread',
                'color' => NULL,
                'parent_id' => 5,
                'order' => 4,
                'created_at' => '2021-02-22 01:56:09',
                'updated_at' => '2021-02-22 02:11:57',
                'route' => 'voyager.bread.index',
                'parameters' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'menu_id' => 1,
                'title' => 'Settings',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-settings',
                'color' => NULL,
                'parent_id' => NULL,
                'order' => 9,
                'created_at' => '2021-02-22 01:56:09',
                'updated_at' => '2021-02-23 10:16:43',
                'route' => 'voyager.settings.index',
                'parameters' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'menu_id' => 1,
                'title' => 'Categories',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-categories',
                'color' => NULL,
                'parent_id' => NULL,
                'order' => 5,
                'created_at' => '2021-02-22 02:06:42',
                'updated_at' => '2021-02-23 10:16:47',
                'route' => 'voyager.categories.index',
                'parameters' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'menu_id' => 1,
                'title' => 'Products',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-basket',
                'color' => NULL,
                'parent_id' => NULL,
                'order' => 4,
                'created_at' => '2021-02-22 02:08:00',
                'updated_at' => '2021-02-23 10:16:47',
                'route' => 'voyager.products.index',
                'parameters' => NULL,
            ),
            12 => 
            array (
                'id' => 17,
                'menu_id' => 3,
                'title' => 'globe',
                'url' => 'https://abbas-alshaqaq.com/',
                'target' => '_self',
                'icon_class' => NULL,
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 2,
                'created_at' => '2021-02-22 02:17:36',
                'updated_at' => '2021-02-22 02:19:19',
                'route' => NULL,
                'parameters' => '',
            ),
            13 => 
            array (
                'id' => 18,
                'menu_id' => 3,
                'title' => 'twitter',
                'url' => 'https://twitter.com/AbbasShDev',
                'target' => '_self',
                'icon_class' => NULL,
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 3,
                'created_at' => '2021-02-22 02:18:02',
                'updated_at' => '2021-02-22 02:19:19',
                'route' => NULL,
                'parameters' => '',
            ),
            14 => 
            array (
                'id' => 19,
                'menu_id' => 3,
                'title' => 'github',
                'url' => 'https://github.com/AbbasShDev',
                'target' => '_self',
                'icon_class' => NULL,
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 4,
                'created_at' => '2021-02-22 02:18:26',
                'updated_at' => '2021-02-22 02:19:19',
                'route' => NULL,
                'parameters' => '',
            ),
            15 => 
            array (
                'id' => 20,
                'menu_id' => 3,
                'title' => 'linkedin',
                'url' => 'https://www.linkedin.com/in/abbas-alshaqaq/',
                'target' => '_self',
                'icon_class' => NULL,
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 5,
                'created_at' => '2021-02-22 02:19:01',
                'updated_at' => '2021-02-22 02:19:19',
                'route' => NULL,
                'parameters' => '',
            ),
            16 => 
            array (
                'id' => 21,
                'menu_id' => 3,
                'title' => 'Follow Me:',
                'url' => '',
                'target' => '_self',
                'icon_class' => NULL,
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 1,
                'created_at' => '2021-02-22 02:19:10',
                'updated_at' => '2021-02-22 02:19:19',
                'route' => NULL,
                'parameters' => '',
            ),
            17 => 
            array (
                'id' => 22,
                'menu_id' => 1,
                'title' => 'Orders',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-documentation',
                'color' => NULL,
                'parent_id' => NULL,
                'order' => 2,
                'created_at' => '2021-02-23 10:07:34',
                'updated_at' => '2021-02-23 10:16:50',
                'route' => 'voyager.orders.index',
                'parameters' => NULL,
            ),
        ));
        
        
    }
}