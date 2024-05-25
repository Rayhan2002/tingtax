<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = [
            ['name' => 'TAXATION'],
            ['name' => 'ACCOUNTING'],
            ['name' => 'EDUCATION'],
            // Tambahkan kategori lain jika perlu
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
