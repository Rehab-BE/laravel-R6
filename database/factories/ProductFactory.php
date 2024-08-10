<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->randomElement(['Glazed', 'Telofill', 'Follicle','Lightweeight Nail','Honey Glow']),
            'short_description' => fake()->text(),
            'price' => fake()->randomFloat(2),
            'image' => basename(fake()->image(public_path('asset/images/products'))),
        ];
    }
}
