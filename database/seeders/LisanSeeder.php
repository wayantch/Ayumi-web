<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lisan;

class LisanSeeder extends Seeder
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
                'reason' => 'Wawancara',
                'date' => '2024-07-15',
            ],
            [
                'name' => 'Anita Wijaya',
                'email' => 'anita.wijaya@example.com',
                'phone' => '0876543210',
                'company' => 'XYZ Corporation',
                'reason' => 'Pertemuan',
                'date' => '2024-07-16',
            ],
            [
                'name' => 'Cahya Indrawan',
                'email' => 'cahya.indrawan@example.com',
                'phone' => '08987654321',
                'company' => '123 Industries',
                'reason' => 'Presentasi',
                'date' => '2024-07-17',
            ],
            [
                'name' => 'Dewi Sari',
                'email' => 'dewi.sari@example.com',
                'phone' => '08111222333',
                'company' => 'Brown Enterprises',
                'reason' => 'Konsultasi',
                'date' => '2024-07-18',
            ],
            [
                'name' => 'Eko Wibowo',
                'email' => 'eko.wibowo@example.com',
                'phone' => '08123456789',
                'company' => 'Lee Group',
                'reason' => 'Pelatihan',
                'date' => '2024-07-19',
            ],
            [
                'name' => 'Fita Nugraha',
                'email' => 'fita.nugraha@example.com',
                'phone' => '0876543210',
                'company' => 'Wilson Co.',
                'reason' => 'Diskusi',
                'date' => '2024-07-20',
            ],
            [
                'name' => 'Gita Pratiwi',
                'email' => 'gita.pratiwi@example.com',
                'phone' => '08987654321',
                'company' => 'Garcia Ltd.',
                'reason' => 'Negosiasi',
                'date' => '2024-07-21',
            ],
            [
                'name' => 'Hadianto Putra',
                'email' => 'hadianto.putra@example.com',
                'phone' => '08111222333',
                'company' => 'Martinez Inc.',
                'reason' => 'Review',
                'date' => '2024-07-22',
            ],
            [
                'name' => 'Ika Kusuma',
                'email' => 'ika.kusuma@example.com',
                'phone' => '08123456789',
                'company' => 'Miller Enterprises',
                'reason' => 'Pitch',
                'date' => '2024-07-23',
            ],
            [
                'name' => 'Joko Saputro',
                'email' => 'joko.saputro@example.com',
                'phone' => '0876543210',
                'company' => 'Taylor Co.',
                'reason' => 'Proposal',
                'date' => '2024-07-24',
            ],
            [
                'name' => 'Kartika Sari',
                'email' => 'kartika.sari@example.com',
                'phone' => '08987654321',
                'company' => 'Moore Group',
                'reason' => 'Kontrak',
                'date' => '2024-07-25',
            ],
            [
                'name' => 'Lia Rahayu',
                'email' => 'lia.rahayu@example.com',
                'phone' => '08111222333',
                'company' => 'Anderson Ltd.',
                'reason' => 'Evaluasi',
                'date' => '2024-07-26',
            ],
            [
                'name' => 'Maman Setiawan',
                'email' => 'maman.setiawan@example.com',
                'phone' => '08123456789',
                'company' => 'Hernandez Inc.',
                'reason' => 'Diskusi',
                'date' => '2024-07-27',
            ],
            [
                'name' => 'Nia Anggraeni',
                'email' => 'nia.anggraeni@example.com',
                'phone' => '0876543210',
                'company' => 'Gonzalez Co.',
                'reason' => 'Pertemuan',
                'date' => '2024-07-28',
            ],
            [
                'name' => 'Oscar Wijaya',
                'email' => 'oscar.wijaya@example.com',
                'phone' => '08987654321',
                'company' => 'Perez Group',
                'reason' => 'Wawancara',
                'date' => '2024-07-29',
            ],
        ];

        foreach ($data as $item) {
            Lisan::create($item);
        }
    }
}

