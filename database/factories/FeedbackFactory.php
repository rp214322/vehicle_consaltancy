<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeedbackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id, // Random existing user ID
            'description' => $this->faker->sentence(10), // Generate a random description
            'rating' => $this->faker->numberBetween(1, 5), // Rating between 1 and 5
            'status' => $this->faker->randomElement([0, 1]), // Random status (0 or 1)
        ];
    }
}
