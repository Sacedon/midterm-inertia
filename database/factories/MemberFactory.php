<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'last_name' => fake()->lastname,
            'first_name' => fake()->firstname,
            'designation' => fake()->jobTitle,
            'company_id' => fake()->numberBetween(0,9)

        ];
    }
}
