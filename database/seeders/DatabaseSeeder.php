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

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(500)->create();
        Brands::factory(500)->create();
        Products::factory(500)->create();
        ProductImages::factory(500)->create();
        User::factory(500)->create();
        
        //Stocks::factory(500)->create();
        
        User::factory()->create([
            'username' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123'),
            'role' => 'admin',
        ]);

    }
}
