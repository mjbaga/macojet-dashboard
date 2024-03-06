<?php

namespace Database\Factories;

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

    public static array $scheduleType = ['Regular 9 - 5 weekdays', 'Irregular'];

    public function definition(): array
    {
        return [
            //
        ];
    }
}
