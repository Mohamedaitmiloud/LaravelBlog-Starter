<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user = App\User::create([
            'name' => 'Mohamed Aitmiloud',
            'email' => 'mohammed.aitmiloud@gmail.com',
            'password' => bcrypt('123456'),
            'isAdmin' => 1
        ]);

        App\Profile::create([
            'user_id' => $user->id
        ]);
    }
}
