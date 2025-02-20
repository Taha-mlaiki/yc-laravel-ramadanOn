<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "username" => $this->faker->name(),
            "email" => $this->faker->unique()->email(),
            "title" => $this->faker->sentence(),
            "description" => $this->faker->sentence(20),
            "body" => $this->faker->text(),
        ];
    }
}
