<?php

namespace Database\Factories;

use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

class CellOccupationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'location_id' => Location::factory(),
            'cell' => fake()->numberBetween(0, 200),
            'start_time' => fake()->dateTimeBetween('-30 years', 'now'),
            'end_time' => fake()->dateTimeBetween('now', '10 years'),
        ];
    }
}
