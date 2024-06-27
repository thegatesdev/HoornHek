<?php

namespace Database\Factories;

use App\Models\CaseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class EvidenceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'case_id' => CaseModel::factory(),
            'description' => fake()->realText(100),
        ];
    }
}
