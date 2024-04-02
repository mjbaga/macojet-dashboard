<?php

namespace Database\Factories;

use App\Models\Boarder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transient>
 */
class TransientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'gender' => fake()->randomElement(Boarder::$genders),
            'contact_number' => fake()->phoneNumber,
            'fb_account_name' => fake()->name(),
            'date_of_birth' => fake()->dateTimeBetween('1970-01-01', '2004-12-31'),
            'origin_address' => fake()->address(),
        ];
    }
}
