<?php

namespace Database\Factories;

use App\Models\StudentProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentProfile>
 */
class StudentProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'schedule_type' => fake()->randomElement(StudentProfile::$schedule),
            'vaccine' => fake()->randomElement(StudentProfile::$vaccine),
            'home_on_weekends' => fake()->boolean,
        ];
    }
}
