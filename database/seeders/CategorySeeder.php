<?php

namespace Database\Seeders;

use App\Http\Controllers\CategoryClassController;
use App\Models\Category;
use App\Models\CategoryClass; // Ubah namespace model sesuai dengan nama model yang sebenarnya
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryData = [
            [
                'name' => 'Kategori A',
            ],
            [
                'name' => 'Kategori B',
            ],
            [
                'name' => 'Kategori C',
            ],
            [
                'name' => 'Kategori D',
            ],
            [
                'name' => 'Kategori E',
            ],
        ];

        foreach ($categoryData as $key => $value) {
            Category::create($value);
        }
    }
}
