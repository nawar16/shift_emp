<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

<<<<<<< HEAD
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
=======
>>>>>>> edeeaa1b89af8af2dc16a2bda625163283dedbd2
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
<<<<<<< HEAD
     * @return array<string, mixed>
=======
     * @return array
>>>>>>> edeeaa1b89af8af2dc16a2bda625163283dedbd2
     */
    public function definition()
    {
        return [
<<<<<<< HEAD
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
=======
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
>>>>>>> edeeaa1b89af8af2dc16a2bda625163283dedbd2
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
<<<<<<< HEAD
     * @return static
=======
     * @return \Illuminate\Database\Eloquent\Factories\Factory
>>>>>>> edeeaa1b89af8af2dc16a2bda625163283dedbd2
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
