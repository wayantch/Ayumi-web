<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'phone' => '1234567890',
                'role' => 'admin',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'phone' => '087781189068',
                'role' => 'user',
                'password' => bcrypt('user'),
            ],
            [
                'name' => 'Wayan',
                'email' => 'wayan@gmail.com',
                'phone' => '087781189068',
                'role' => 'user',
                'password' => bcrypt('user'),
            ],
            // Tambah data dummy lainnya untuk mencapai total 15
            [
                'name' => 'Adi Nugroho',
                'email' => 'adi.nugroho@example.com',
                'phone' => '08123456789',
                'role' => 'user',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Rina Sari',
                'email' => 'rina.sari@example.com',
                'phone' => '0876543210',
                'role' => 'user',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Ahmad Yani',
                'email' => 'ahmad.yani@example.com',
                'phone' => '08234567890',
                'role' => 'user',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Siti Rahmah',
                'email' => 'siti.rahmah@example.com',
                'phone' => '08123456789',
                'role' => 'user',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Bambang Setiawan',
                'email' => 'bambang.setiawan@example.com',
                'phone' => '08234567890',
                'role' => 'user',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Dewi Anggraini',
                'email' => 'dewi.anggraini@example.com',
                'phone' => '08123456789',
                'role' => 'user',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Eko Saputra',
                'email' => 'eko.saputra@example.com',
                'phone' => '08234567890',
                'role' => 'user',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Fitri Handayani',
                'email' => 'fitri.handayani@example.com',
                'phone' => '08123456789',
                'role' => 'user',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Galih Pratama',
                'email' => 'galih.pratama@example.com',
                'phone' => '08234567890',
                'role' => 'user',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Hana Dewi',
                'email' => 'hana.dewi@example.com',
                'phone' => '08123456789',
                'role' => 'user',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Indra Gunawan',
                'email' => 'indra.gunawan@example.com',
                'phone' => '08234567890',
                'role' => 'user',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Joko Santoso',
                'email' => 'joko.santoso@example.com',
                'phone' => '08123456789',
                'role' => 'user',
                'password' => bcrypt('password'),
            ],
        ];

        foreach ($userData as $key => $value) {
            User::create($value);
        }
    }
}
