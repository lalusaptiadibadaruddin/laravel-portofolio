<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'administrator',
            'email' => 'admin@email.com',
            'role_id' => '1',
            'password' => bcrypt('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@email.com',
            'role_id' => '2',
            'password' => bcrypt('password'),
        ]);
    }
}
