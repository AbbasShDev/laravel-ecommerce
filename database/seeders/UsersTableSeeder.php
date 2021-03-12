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
                'id' => 1,
                'role_id' => 1,
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$OBFT.roc7xBNOtki7GVGSuMuqo1zTv6Sdj9LsYReYXC5D4axZ8k1S',
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2021-02-22 01:56:28',
                'updated_at' => '2021-02-22 01:56:28',
                'shipping_address' => NULL,
                'shipping_city' => NULL,
                'shipping_province' => NULL,
                'shipping_postalcode' => NULL,
                'shipping_phone' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'role_id' => 2,
                'name' => 'user',
                'email' => 'user@user.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$73FGjcjPlPw0HJjajqGtle9fRqs2USXh1v/1lTUQ2xp0Sw0RTxZhm',
                'remember_token' => 'swKTl7Fhqgtxbrg7BEABEV3vccVJlm3t6AZFIA3g6ojofwNwr5BWOoOCv4yI',
                'settings' => NULL,
                'created_at' => '2021-02-22 10:03:41',
                'updated_at' => '2021-03-06 17:06:10',
                'shipping_address' => '1833 Riverside Drive',
                'shipping_city' => 'Ottawa',
                'shipping_province' => 'Ontario',
                'shipping_postalcode' => 'K1G 0E8',
                'shipping_phone' => '6132522672',
            ),
            2 => 
            array (
                'id' => 3,
                'role_id' => 2,
                'name' => 'Test Test',
                'email' => 'test@test.test',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$.uz7eTOBkPtnx5ansdNAfes73nX2rHOy9nfogGsS7kk2nG5z/54n.',
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2021-03-05 10:52:33',
                'updated_at' => '2021-03-05 10:53:55',
                'shipping_address' => '307 Southcrest private',
                'shipping_city' => 'Ottawa',
                'shipping_province' => 'ON',
                'shipping_postalcode' => 'K1V2B7',
                'shipping_phone' => '6132522672',
            ),
            3 => 
            array (
                'id' => 4,
                'role_id' => 2,
                'name' => 'Luke Hardy',
                'email' => 'punar@mailinator.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$ISIww1jnOkCuNDpmsQSFKuMygoqmFwxZodObR0vBykkjR.1h8vAL6',
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2021-03-09 14:20:05',
                'updated_at' => '2021-03-09 14:29:06',
                'shipping_address' => 'Sint esse cumque nem',
                'shipping_city' => 'Cum ipsum corporis v',
                'shipping_province' => 'Aspernatur et et eum',
                'shipping_postalcode' => 'Molestiae sunt possi',
            'shipping_phone' => '+1 (958) 152-6805',
            ),
        ));
        
        
    }
}