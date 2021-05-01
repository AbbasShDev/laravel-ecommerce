<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'avatar' => 'users/default.png',
                'created_at' => '2021-02-22 01:56:28',
                'email' => 'admin@admin.com',
                'email_verified_at' => NULL,
                'id' => 1,
                'name' => 'admin',
                'password' => '$2y$10$OBFT.roc7xBNOtki7GVGSuMuqo1zTv6Sdj9LsYReYXC5D4axZ8k1S',
                'remember_token' => NULL,
                'role_id' => 1,
                'settings' => NULL,
                'shipping_address' => '1833 Riverside Drive',
                'shipping_city' => 'Ottawa',
                'shipping_phone' => '6132522672',
                'shipping_postalcode' => 'K1G 0E8',
                'shipping_province' => 'Ontario',
                'updated_at' => '2021-03-12 22:58:07',
            ),
            1 => 
            array (
                'avatar' => 'users/default.png',
                'created_at' => '2021-02-22 10:03:41',
                'email' => 'user@user.com',
                'email_verified_at' => NULL,
                'id' => 2,
                'name' => 'user',
                'password' => '$2y$10$73FGjcjPlPw0HJjajqGtle9fRqs2USXh1v/1lTUQ2xp0Sw0RTxZhm',
                'remember_token' => '8QUetJyUpmaeFAeO6GoNyRylxqLzoQo4ioaXccIY6aOvAytGGMRdfqrG5ILt',
                'role_id' => 2,
                'settings' => NULL,
                'shipping_address' => '1833 Riverside Drive',
                'shipping_city' => 'Ottawa',
                'shipping_phone' => '6132522672',
                'shipping_postalcode' => 'K1G 0E8',
                'shipping_province' => 'Ontario',
                'updated_at' => '2021-03-06 17:06:10',
            ),
            2 => 
            array (
                'avatar' => 'users/default.png',
                'created_at' => '2021-03-05 10:52:33',
                'email' => 'test@test.test',
                'email_verified_at' => NULL,
                'id' => 3,
                'name' => 'Test Test',
                'password' => '$2y$10$.uz7eTOBkPtnx5ansdNAfes73nX2rHOy9nfogGsS7kk2nG5z/54n.',
                'remember_token' => NULL,
                'role_id' => 2,
                'settings' => NULL,
                'shipping_address' => '307 Southcrest private',
                'shipping_city' => 'Ottawa',
                'shipping_phone' => '6132522672',
                'shipping_postalcode' => 'K1V2B7',
                'shipping_province' => 'ON',
                'updated_at' => '2021-03-05 10:53:55',
            ),
            3 => 
            array (
                'avatar' => 'users/default.png',
                'created_at' => '2021-03-09 14:20:05',
                'email' => 'punar@mailinator.com',
                'email_verified_at' => NULL,
                'id' => 4,
                'name' => 'Luke Hardy',
                'password' => '$2y$10$ISIww1jnOkCuNDpmsQSFKuMygoqmFwxZodObR0vBykkjR.1h8vAL6',
                'remember_token' => NULL,
                'role_id' => 2,
                'settings' => NULL,
                'shipping_address' => 'Sint esse cumque nem',
                'shipping_city' => 'Cum ipsum corporis v',
            'shipping_phone' => '+1 (958) 152-6805',
                'shipping_postalcode' => 'Molestiae sunt possi',
                'shipping_province' => 'Aspernatur et et eum',
                'updated_at' => '2021-03-09 14:29:06',
            ),
            4 => 
            array (
                'avatar' => 'users/default.png',
                'created_at' => '2021-03-13 22:49:13',
                'email' => 'editor@editor.com',
                'email_verified_at' => NULL,
                'id' => 5,
                'name' => 'editor',
                'password' => '$2y$10$qSen41MUbmJ34vuyucwHIOYaGTE7efRxbcc4gqeGmZgdvISkBbMkK',
                'remember_token' => NULL,
                'role_id' => 3,
                'settings' => '{"locale":"en"}',
                'shipping_address' => NULL,
                'shipping_city' => NULL,
                'shipping_phone' => NULL,
                'shipping_postalcode' => NULL,
                'shipping_province' => NULL,
                'updated_at' => '2021-03-13 22:49:13',
            ),
            5 => 
            array (
                'avatar' => 'users/default.png',
                'created_at' => '2021-03-13 22:52:22',
                'email' => 'demo@demo.com',
                'email_verified_at' => NULL,
                'id' => 6,
                'name' => 'demo',
                'password' => '$2y$10$ShG6yzsv0bXMAVlzayitDu4l4.3SgeP6WV47Vsp1HwlWzVR7bNYpy',
                'remember_token' => NULL,
                'role_id' => 4,
                'settings' => '{"locale":"en"}',
                'shipping_address' => NULL,
                'shipping_city' => NULL,
                'shipping_phone' => NULL,
                'shipping_postalcode' => NULL,
                'shipping_province' => NULL,
                'updated_at' => '2021-03-13 22:52:22',
            ),
            6 => 
            array (
                'avatar' => 'users/default.png',
                'created_at' => '2021-03-25 16:50:01',
                'email' => 'abbas20alzaeem@gmail.com',
                'email_verified_at' => NULL,
                'id' => 7,
                'name' => 'Abbas Alshaqaq',
                'password' => '$2y$10$imbtOS8MB7nahR0ObV.HWOYXR0.8d2J63d3JLgCh61Kx9TUTKLK/.',
                'remember_token' => NULL,
                'role_id' => 2,
                'settings' => NULL,
                'shipping_address' => 'Obcaecati ut iusto a',
                'shipping_city' => 'Velit enim voluptas',
            'shipping_phone' => '+1 (227) 933-4657',
                'shipping_postalcode' => 'Qui magni a ipsa as',
                'shipping_province' => 'Officia incididunt u',
                'updated_at' => '2021-03-26 11:24:24',
            ),
            7 => 
            array (
                'avatar' => 'users/default.png',
                'created_at' => '2021-04-09 14:55:45',
                'email' => 'JohnDoe@laramerce.me',
                'email_verified_at' => NULL,
                'id' => 8,
                'name' => 'JohnDoe',
                'password' => '$2y$10$6wdxQonjxwyZ66UViF4Hv.2vUYdIMnmhw6Y6xGXbUD4gm.AMy0YB.',
                'remember_token' => NULL,
                'role_id' => 2,
                'settings' => NULL,
                'shipping_address' => 'Consequatur dolor u',
                'shipping_city' => 'Laborum Nostrud mol',
            'shipping_phone' => '+1 (584) 339-9185',
                'shipping_postalcode' => 'Id voluptatem Dolor',
                'shipping_province' => 'Velit veniam magni',
                'updated_at' => '2021-04-09 14:56:26',
            ),
            8 => 
            array (
                'avatar' => 'users/default.png',
                'created_at' => '2021-04-28 09:55:09',
                'email' => 'korimogen@mailinator.com',
                'email_verified_at' => NULL,
                'id' => 9,
                'name' => 'Hedy Anthony',
                'password' => '$2y$10$4bFx80NqUFEcdEI5xqQS7eHvLgKTZRziPTqMviH1ah37YT9.70Sy.',
                'remember_token' => NULL,
                'role_id' => 2,
                'settings' => NULL,
                'shipping_address' => NULL,
                'shipping_city' => NULL,
                'shipping_phone' => NULL,
                'shipping_postalcode' => NULL,
                'shipping_province' => NULL,
                'updated_at' => '2021-04-28 09:55:09',
            ),
            9 => 
            array (
                'avatar' => 'users/default.png',
                'created_at' => '2021-04-28 09:55:38',
                'email' => 'qikuli@mailinator.com',
                'email_verified_at' => NULL,
                'id' => 10,
                'name' => 'Lynn Mckinney',
                'password' => '$2y$10$fvV.fTZRzxmBQ7Eyogc.Gu1MMc1.5zevzZBxe.OYsoUIJeKHCX3UK',
                'remember_token' => NULL,
                'role_id' => 2,
                'settings' => NULL,
                'shipping_address' => NULL,
                'shipping_city' => NULL,
                'shipping_phone' => NULL,
                'shipping_postalcode' => NULL,
                'shipping_province' => NULL,
                'updated_at' => '2021-04-28 09:55:38',
            ),
            10 => 
            array (
                'avatar' => 'users/default.png',
                'created_at' => '2021-05-01 07:37:35',
                'email' => 'biqo@mailinator.com',
                'email_verified_at' => NULL,
                'id' => 11,
                'name' => 'Marah Mendez',
                'password' => '$2y$10$ZSgYCZgAmCN0aj9dgYQrP.zC1VAcllG1St50FNRz08w2YCLecYQTq',
                'remember_token' => NULL,
                'role_id' => 2,
                'settings' => NULL,
                'shipping_address' => NULL,
                'shipping_city' => NULL,
                'shipping_phone' => NULL,
                'shipping_postalcode' => NULL,
                'shipping_province' => NULL,
                'updated_at' => '2021-05-01 07:37:36',
            ),
            11 => 
            array (
                'avatar' => 'users/default.png',
                'created_at' => '2021-05-01 07:38:45',
                'email' => 'rimoq@mailinator.com',
                'email_verified_at' => NULL,
                'id' => 12,
                'name' => 'Phelan Slater',
                'password' => '$2y$10$ltDWxHi18JsD/yj.hvnDG.maNkcxWZ9o9oFgUUEid603zbfirBci2',
                'remember_token' => NULL,
                'role_id' => 2,
                'settings' => NULL,
                'shipping_address' => NULL,
                'shipping_city' => NULL,
                'shipping_phone' => NULL,
                'shipping_postalcode' => NULL,
                'shipping_province' => NULL,
                'updated_at' => '2021-05-01 07:38:45',
            ),
        ));
        
        
    }
}