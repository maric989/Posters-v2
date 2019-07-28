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
//        \DB::table('users')->insert([
//           'name' => 'admin',
//           'role_id' => 1,
//           'email' => 'admin@maric.com',
//           'password' => bcrypt('maric1989'),
//           'slug' => 'admin'
//        ]);
//
//        \DB::table('users')->insert([
//            'name' => 'umetnik',
//            'role_id' => 2,
//            'email' => 'umetnik@maric.com',
//            'password' => bcrypt('umetnik'),
//            'slug' => 'umetnik'
//        ]);
//
//        \DB::table('users')->insert([
//            'name' => 'umetnik2',
//            'role_id' => 2,
//            'email' => 'umetnik2@maric.com',
//            'password' => bcrypt('umetnik2'),
//            'slug' => 'umetnik2'
//        ]);

        \DB::table('users')->insert([
            'name' => 'umetnik3',
            'role_id' => 2,
            'email' => 'umetnik3@maric.com',
            'password' => bcrypt('umetnik2'),
            'slug' => 'umetnik3'
        ]);

        \DB::table('users')->insert([
            'name' => 'umetnik4',
            'role_id' => 2,
            'email' => 'umetnik4@maric.com',
            'password' => bcrypt('umetnik2'),
            'slug' => 'umetnik4'
        ]);

        \DB::table('users')->insert([
            'name' => 'umetnik5',
            'role_id' => 2,
            'email' => 'umetnik5@maric.com',
            'password' => bcrypt('umetnik2'),
            'slug' => 'umetnik5'
        ]);

        \DB::table('users')->insert([
            'name' => 'umetnik6',
            'role_id' => 2,
            'email' => 'umetnik6@maric.com',
            'password' => bcrypt('umetnik2'),
            'slug' => 'umetnik6'
        ]);

        \DB::table('users')->insert([
            'name' => 'umetnik7',
            'role_id' => 2,
            'email' => 'umetnik7@maric.com',
            'password' => bcrypt('umetnik2'),
            'slug' => 'umetnik7'
        ]);

        \DB::table('users')->insert([
            'name' => 'umetnik8',
            'role_id' => 2,
            'email' => 'umetnik8@maric.com',
            'password' => bcrypt('umetnik2'),
            'slug' => 'umetnik8'
        ]);

        \DB::table('users')->insert([
            'name' => 'umetnik9',
            'role_id' => 2,
            'email' => 'umetnik9@maric.com',
            'password' => bcrypt('umetnik2'),
            'slug' => 'umetnik9'
        ]);

        \DB::table('users')->insert([
            'name' => 'umetnik10',
            'role_id' => 2,
            'email' => 'umetnik10@maric.com',
            'password' => bcrypt('umetnik2'),
            'slug' => 'umetnik10'
        ]);
    }
}
