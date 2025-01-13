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
            'expertise' => fake()->randomElement(['HTML', 'CSS', 'JavaScript']),
            'date' => fake()->date(),
            'timeslot' => fake()->randomElement(['morning', 'afternoon', 'evening']),
            'status' => fake()->randomElement(['pending', 'accepted', 'rejected', 'canceled', 'completed']),
            'score' => fake()->randomFloat(1, 0, 100),
        ];
    }
}
