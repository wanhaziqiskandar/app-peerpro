<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TuitionRequest>
 */
class TuitionRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tutor_id' => fake()->numberBetween(1, 10),
            'tutee_id' => fake()->numberBetween(1, 10),
            'expertise' => fake()->words(fake()->numberBetween(1, 5), true),
            'timeslot' => fake()->time('Y-m-d H:i:s'),
        ];
    }
}
