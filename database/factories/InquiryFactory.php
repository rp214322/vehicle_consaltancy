<?php

namespace Database\Factories;

use App\Models\Inquiry;
use App\Models\Vehical;
use Illuminate\Database\Eloquent\Factories\Factory;

class InquiryFactory extends Factory
{
    protected $model = Inquiry::class;

    public function definition()
    {
        return [
            'type' => $this->faker->randomElement(['buy', 'sell']),
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->boolean(),
        ];
    }
}
