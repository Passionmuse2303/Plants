<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'username' => 'Daniel Pat',
            'email' => 'account@breederplants.nl',
            'password' => bcrypt('123456'),
            'role' => 'admin',
        ]);
    }
}
