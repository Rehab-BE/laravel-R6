<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Class1>
 */
class Class1Factory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'class_name' => fake()->randomElement(['English', 'math', 'islamic','french','science']),
            'capacity' => fake()->randomNumber(),
            'is_fulled' => fake()->numberBetween(0, 1),
            'price' => fake()->randomFloat(2),
            'time_from'=>fake()->dateTimeBetween('-1 month', 'now')->format('Y-m-d H:i:s'),
            'time_to'=> fake()->dateTimeBetween('now', '+1 month')->format('Y-m-d H:i:s'),
            'image' => basename(fake()->image(public_path('asset/images/classes/'))),
        ];
    }
}
