<?php

namespace Database\Factories;

use App\Models\Brands;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;



class ProductsFactory extends Factory
{
    protected $model = Products::class;
    
    public function definition(): array
    {
        $faker = \Faker\Factory::create();
        $name = $this->faker->sentence(3);
        $slug = Str::slug($name);
        return [
            'brand_id' => Brands::inRandomOrder()->first(),
            'category_id' => Category::inRandomOrder()->first(),
            'name' => $name,
            'slug' => $slug,
            'description' => $this->faker->paragraph,
            'status' => $this->faker->boolean(80),
            'featured' => $this->faker->boolean(50),
            'meta_name' => $name. ' - Meta Name',
            'meta_keyword' => $this->faker->word . ',' . $this->faker->word . ',' . $this->faker->word,
            'meta_description' => $this->faker->sentence(10),
        ];
    }

    /**
     * Indicate that the model's status to be Inactive 'False or 0'.
     */
    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 0,
        ]);
    }
    /**
     * Indicate that the model's featured to be 'YES'.
     */
    public function featured(): static
    {
        return $this->state(fn (array $attributes) => [
            'featured' => 1,
        ]);
    }
}
