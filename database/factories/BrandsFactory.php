<?php

namespace Database\Factories;

use App\Models\Brands;
use App\Models\Category;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;



class BrandsFactory extends Factory
{
    protected $model = Brands::class;
    
    public function definition(): array
    {
        $faker = \Faker\Factory::create();
        return [
            'category_id' => Category::inRandomOrder()->first(),
            'name' => $faker->company,
            'slug' => $faker->slug,
            'description' => $faker->paragraph,
            'image' => $faker->imageUrl(),
            'status' => $faker->boolean(80), // 80% chance of getting "true" (Active)
        ];
    }

    /**
     * Indicate that the model's status to be Inactive.
     */
    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 0,
        ]);
    }
}
