<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Recipe;
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
            "category_id" => Category::pluck("id")->random(),
            "description" => $this->faker->sentence(20),
            "body" => $this->faker->text(),
        ];
    }
}
