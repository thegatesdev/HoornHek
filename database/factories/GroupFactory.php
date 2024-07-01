<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GroupFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->words(3, true);
        return [
            'name' => strtolower($name),
            'display_name' => $name,
            'description' => fake()->sentence(),
            'requires_link' => true,
        ];
    }
}
