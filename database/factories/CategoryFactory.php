<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;



class CategoryFactory extends Factory
{
    protected $model = Category::class;
    
    public function definition(): array
    {
        $faker = \Faker\Factory::create();
        return [
            'name' => $faker->sentence(3),
            'slug' => $faker->slug,
            'description' => $faker->sentence(20),
            'image' => $faker->imageUrl(),
            'meta_name' => $faker->sentence(3),
            'meta_keyword' => $faker->word,
            'meta_description' => $faker->sentence(10),
            'status' => $faker->boolean(75) ? 1 : 0,
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
