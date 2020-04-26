<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // DB::table('users')->insert([
        //     'name' => "citron",
        //     'email' => Str::random(10).'@gmail.com',
        //     'password' => Hash::make('password'),
        // ]);

        DB::table('users')->insert([
            // 'id' => 1,
            'name' => "sarah",
            'email' => 'sarah@live.fr',
            'avatar' => 'default-avatar.png',
            'email_verified_at' => NULL,
            'password' => '$2y$10$b0vEbyDy7XcSnQgPM9nE/OvMG/7Z6OMxdYnj0DyIbmsl1fKB4MLpq',
            'remember_token' => NULL,
            'created_at' => '2020-03-17 10:09:20',
            'updated_at' => '2020-03-17 10:12:20',
        ]);

        DB::table('chanson')->insert([
            'id' => 1,
            'nom' => 'Spring Mood - DJ Sledge',
            'url' => '/uploads/1/WGD1K4SaLD1o8049p8Sq88xzG2UTpUAurvebk0dp.mpga', 
            'style' => 'Electro', 
            'image' => '/uploads/albums/spring.jpg', 
            'utilisateur_id' => 1, 
            'created_at' => '2020-03-17 10:23:48', 
            'updated_at' => '2020-03-17 10:23:48',
        ]);

        DB::table('chanson')->insert([
            'id' => 2,
            'nom' => 'Scandinavianz - Atlantis',
            'url' => '/uploads/1/KKJK3NT7AbAp77Dv8AjX7kOMv3fTW42ytk7wN8PT.mpga', 
            'style' => 'Electro', 
            'image' => '/uploads/albums/scandinavia.jpg', 
            'utilisateur_id' => 1, 
            'created_at' => '2020-03-17 10:23:48', 
            'updated_at' => '2020-03-17 10:23:48',
        ]);
    }
}
