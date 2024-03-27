<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'telephone' => '6281318733001',
            'role' => 'Admin',
        ]);

        DB::table('users')->insert([
            'name' => 'Subrata',
            'email' => 'subrata@gmail.com',
            'password' => Hash::make('12345678'),
            'telephone' => '628123456789',
            'role' => 'Customer',
        ]);
    }
}
