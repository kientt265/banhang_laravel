<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => null,
            'create_at' => fake()->date(),
            'order_note' => fake()->sentence(),
        ];
    }
}