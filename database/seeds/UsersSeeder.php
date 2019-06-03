<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
           'name' => 'admin',
           'role_id' => 1,
           'email' => 'admin@maric.com',
           'password' => bcrypt('maric1989'),
           'slug' => 'admin'
        ]);

        \DB::table('users')->insert([
            'name' => 'umetnik',
            'role_id' => 2,
            'email' => 'umetnik@maric.com',
            'password' => bcrypt('umetnik'),
            'slug' => 'umetnik'
        ]);

        \DB::table('users')->insert([
            'name' => 'umetnik2',
            'role_id' => 2,
            'email' => 'umetnik2@maric.com',
            'password' => bcrypt('umetnik2'),
            'slug' => 'umetnik2'
        ]);
    }
}
