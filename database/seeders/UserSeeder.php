<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'=>'tingtaxAdmin',
                'email'=>'tingtax2023@gmail.com',
                'password'=>bcrypt('tingtax2024')
            ],
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
