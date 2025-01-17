<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password = null;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Define the user's role
        $role = $this->faker->randomElement(['tutee', 'tutor']);

        // Common attributes for both tutors and tutees
        $attributes = [
            'name' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'age' => $this->faker->numberBetween(18, 65),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'phone_number' => $this->faker->phoneNumber(),
            'password' => static::$password ??= Hash::make('password'),
            'role' => $role,
            'remember_token' => Str::random(10),
        ];

        // Additional attributes for tutors
        if ($role === 'tutor') {
            $attributes = array_merge($attributes, [
                'experience' => $this->faker->numberBetween(1, 20),
                'account_number' => $this->faker->bankAccountNumber(),
                'qualifications' => 'Bachelor Degree in '. $this->faker->jobTitle(),
                'price_rate' => $this->faker->randomFloat(2, 15, 150), // realistic pricing rates
            ]);
        } else {
            // Set tutor-specific fields to null for tutees
            $attributes = array_merge($attributes, [
                'experience' => null,
                'expertise' => null,
                'account_number' => null,
                'qualifications' => null,
                'price_rate' => null,
            ]);
        }

        return $attributes;
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
