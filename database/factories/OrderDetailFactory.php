<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderDetailFactory extends Factory
{
    public function definition(): array
    {
        return [
            'order_id' => null,
            'product_id' => null,
            'price' => fake()->randomFloat(3, 10, 1000),
        ];
    }
}