<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Brands;
use App\Models\Category;
use App\Models\ProductImages;
use App\Models\Products;
use App\Models\Stocks;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'username' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123'),
            'role' => 'admin',
        ]);

    }
}
