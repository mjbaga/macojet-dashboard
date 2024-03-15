<?php

namespace Database\Factories;

use App\Models\WorkerProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkerProfile>
 */
class WorkerProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'company' => fake()->company(),
            'company_address' => fake()->streetAddress(),
            'position' => fake()->jobTitle(),
            'schedule_type' => fake()->randomElement(WorkerProfile::$scheduleType)
        ];
    }
}
