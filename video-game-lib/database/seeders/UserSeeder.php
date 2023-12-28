<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);

        DB::table('users')->insert([
            'username' => 'user',
            'password' => bcrypt('password'),
            'role' => 'user'
        ]);
    }
}
