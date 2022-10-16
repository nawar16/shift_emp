<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Worker>
 */
class WorkerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => Str::random(9),
            //$this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => Str::random(9),
            //$this->faker->unique()->numberBetween(1,1000000000)
            'timezone_id' => 1, 
        ];
    }
}
