<?php

namespace Database\Factories;

use App\Models\ProductImages;
use App\Models\Products;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;


class ProductImagesFactory extends Factory
{
    protected $model = ProductImages::class;
    
    public function definition(): array
    {
        $faker = \Faker\Factory::create();
       
        return [
           // 'products_id' => Products::inRandomOrder()->first(),
            'products_id' => Products::inRandomOrder()->first(),
            'filename' => $this->faker->imageUrl(),
        ];
    }
    
}
