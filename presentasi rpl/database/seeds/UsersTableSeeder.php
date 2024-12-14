<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // Admin Perusahaan
        User::create([
            'name' => 'Admin Perusahaan',
            'email' => 'admin_perusahaan@example.com',
            'password' => Hash::make('password456'),
            'role' => 'admin_perusahaan',
        ]);

        // Admin Bank
        User::create([
            'name' => 'Admin Bank',
            'email' => 'admin_bank@example.com',
            'password' => Hash::make('password789'),
            'role' => 'admin_bank',
        ]);
    }
}
