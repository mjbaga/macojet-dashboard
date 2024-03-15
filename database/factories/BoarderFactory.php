<?php

namespace Database\Factories;

use App\Models\Boarder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Boarder>
 */
class BoarderFactory extends Factory
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
            'nickname' => fake()->firstName(),
            'gender' => fake()->randomElement(Boarder::$genders),
            'email' => fake()->unique()->safeEmail(),
            'contact_number' => fake()->phoneNumber,
            'fb_account_name' => fake()->name(),
            'date_of_birth' => fake()->dateTimeBetween('1995-01-01', '2004-12-31'),
            'provincial_address' => fake()->address(),
            'name_of_mother' => fake()->name(),
            'mother_contact' => fake()->phoneNumber,
            'name_of_father' => fake()->name(),
            'father_contact' => fake()->phoneNumber
        ];
    }

    public function student()
    {
        return $this->state(function (array $attributes){
            return [
                'profile_type' => 'student'
            ];
        });
    }

    public function reviewee()
    {
        return $this->state(function (array $attributes){
            return [
                'profile_type' => 'reviewee'
            ];
        });
    }

    public function working()
    {
        return $this->state(function (array $attributes){
            return [
                'profile_type' => 'working'
            ];
        });
    }
}
