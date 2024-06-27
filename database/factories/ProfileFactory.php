<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    public function definition(): array
    {
        $startCity = fake()->city();
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'bsn' => fake()->randomNumber(9),
            'address' => fake()->streetAddress(),
            'city' => $startCity,
            'date_of_birth' => fake()->dateTimeBetween('-90 years', '-20 years'),
            'place_of_birth' => fake()->optional(0.3, $startCity)->city(),
        ];
    }
}
