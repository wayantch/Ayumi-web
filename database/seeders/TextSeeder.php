<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Text;

class TextSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Budi Santoso',
                'email' => 'budi.santoso@example.com',
                'phone' => '08123456789',
                'company' => 'ABC Company',
                'type' => 'pdf',
            ],
            [
                'name' => 'Anita Wijaya',
                'email' => 'anita.wijaya@example.com',
                'phone' => '0876543210',
                'company' => 'XYZ Corporation',
                'type' => 'pdf',
            ],
            [
                'name' => 'Cahya Indrawan',
                'email' => 'cahya.indrawan@example.com',
                'phone' => '08987654321',
                'company' => '123 Industries',
                'type' => 'pdf',
            ],
            [
                'name' => 'Dewi Sari',
                'email' => 'dewi.sari@example.com',
                'phone' => '08111222333',
                'company' => 'Brown Enterprises',
                'type' => 'pdf',
            ],
            [
                'name' => 'Eko Wibowo',
                'email' => 'eko.wibowo@example.com',
                'phone' => '08123456789',
                'company' => 'Lee Group',
                'type' => 'pdf',
            ],
            [
                'name' => 'Fita Nugraha',
                'email' => 'fita.nugraha@example.com',
                'phone' => '0876543210',
                'company' => 'Wilson Co.',
                'type' => 'pdf',
            ],
            [
                'name' => 'Gita Pratiwi',
                'email' => 'gita.pratiwi@example.com',
                'phone' => '08987654321',
                'company' => 'Garcia Ltd.',
                'type' => 'pdf',
            ],
            [
                'name' => 'Hadianto Putra',
                'email' => 'hadianto.putra@example.com',
                'phone' => '08111222333',
                'company' => 'Martinez Inc.',
                'type' => 'pdf',
            ],
            [
                'name' => 'Ika Kusuma',
                'email' => 'ika.kusuma@example.com',
                'phone' => '08123456789',
                'company' => 'Miller Enterprises',
                'type' => 'pdf',
            ],
            [
                'name' => 'Joko Saputro',
                'email' => 'joko.saputro@example.com',
                'phone' => '0876543210',
                'company' => 'Taylor Co.',
                'type' => 'pdf',
            ],
            [
                'name' => 'Kartika Sari',
                'email' => 'kartika.sari@example.com',
                'phone' => '08987654321',
                'company' => 'Moore Group',
                'type' => 'pdf',
            ],
            [
                'name' => 'Lia Rahayu',
                'email' => 'lia.rahayu@example.com',
                'phone' => '08111222333',
                'company' => 'Anderson Ltd.',
                'type' => 'pdf',
            ],
            [
                'name' => 'Maman Setiawan',
                'email' => 'maman.setiawan@example.com',
                'phone' => '08123456789',
                'company' => 'Hernandez Inc.',
                'type' => 'pdf',
            ],
            [
                'name' => 'Nia Anggraeni',
                'email' => 'nia.anggraeni@example.com',
                'phone' => '0876543210',
                'company' => 'Gonzalez Co.',
                'type' => 'pdf',
            ],
            [
                'name' => 'Oscar Wijaya',
                'email' => 'oscar.wijaya@example.com',
                'phone' => '08987654321',
                'company' => 'Perez Group',
                'type' => 'pdf',
            ],
        ];

        foreach ($data as $item) {
            Text::create($item);
        }
    }
}

