<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Seed Admin
        User::create([
            'name' => 'Admin Aspirasiku',
            'username' => 'admin',
            'nik' => null,
            'email' => 'admin@aspirasiku.test',
            'password' => Hash::make('password'),
            'telp' => '081234567890',
            'role' => 'admin',
            'status' => 'active',
        ]);

        // 2. Seed Petugas (Staff)
        User::create([
            'name' => 'Budi Petugas',
            'username' => 'petugas',
            'nik' => null,
            'email' => 'petugas@aspirasiku.test',
            'password' => Hash::make('password'),
            'telp' => '081234567891',
            'role' => 'petugas',
            'status' => 'active',
        ]);

        // 3. Seed Masyarakat 1
        User::create([
            'name' => 'Ahmad Masyarakat',
            'username' => 'ahmad',
            'nik' => '1234567890123456',
            'email' => 'ahmad@aspirasiku.test',
            'password' => Hash::make('password'),
            'telp' => '081234567892',
            'role' => 'masyarakat',
            'status' => 'active',
        ]);

        // 4. Seed Masyarakat 2
        User::create([
            'name' => 'Siti Aminah',
            'username' => 'siti',
            'nik' => '3201234567890001',
            'email' => 'siti@aspirasiku.test',
            'password' => Hash::make('password'),
            'telp' => '089876543210',
            'role' => 'masyarakat',
            'status' => 'active',
        ]);
    }
}
