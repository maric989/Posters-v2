<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
           'name' => 'Admin'
        ]);

        DB::table('roles')->insert([
            'name' => 'Creator'
        ]);

        DB::table('roles')->insert([
            'name' => 'Guest'
        ]);
    }
}
