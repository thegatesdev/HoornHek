<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class PrisonerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'profile_id' => Profile::factory(),
        ];
    }
}
