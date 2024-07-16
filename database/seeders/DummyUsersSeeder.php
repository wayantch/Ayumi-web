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
        ];

        foreach ($userData as $key => $value) {
            User::create($value);
        }
    }
}
