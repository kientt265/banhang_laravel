<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => null,
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'address' => fake()->address(),
            'phone' => fake()->unique()->phoneNumber(),
            'image' => fake()->imageUrl(),
            'birthday' => fake()->date(),
            'gender' => fake()->randomElement(['male', 'female']),
        ];
    }
}