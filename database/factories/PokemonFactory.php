<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\WithFaker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pokemon>
 */
class PokemonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->colorName(),
            'description' => $this->faker->sentence(),
            'type' => $this->faker->randomElement(['fire', 'water', 'grass']),
            'url' => $this->faker->imageUrl()
        ];
    }
}
