<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $admins = [
            [
                'username' => 'superadmin',
                'password' => bcrypt('password123'),
                'email' => 'superadmin@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'admin1',
                'password' => bcrypt('adminpass1'),
                'email' => 'admin1@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'admin2',
                'password' => bcrypt('adminpass2'),
                'email' => 'admin2@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Admin::insert($admins);
    }
}