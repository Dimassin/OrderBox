<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->unique()->sentence(),
            'description' => fake()->text(),
            'price' => $this->faker->randomFloat(2, 1, 10000),
            'category_id' => Category::get()->random()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
