<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([
            'title'=>'BlogStarter',
            'about'=>'This is a laravel 5.6 blog starter made for practic',
            'contact_email' => 'blogStarter@blog.com',
            'contact_number' => '+212612345678'
        ]);
    }
}
