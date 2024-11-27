<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TuitionTimeslot>
 */
class TuitionTimeslotFactory extends Factory
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
            'date' => fake()->date($format = 'Y-m-d', ),
            'startTime' => fake()->time('H:i:s'),
            'endTime' => fake()->time('H:i:s'),
        ];
    }
}
