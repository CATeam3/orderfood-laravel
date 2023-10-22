<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => fake()->numberBetween(1,2),
            'picture' => fake()->text(),
            'name' => fake()->title(),
            'description' => fake()->text(),
            'price' => fake()->numberBetween(1,5),
            'rating' => fake()->numberBetween(1,5),
        ];
    }
}
