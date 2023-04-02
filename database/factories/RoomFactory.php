<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'roomNo' => $this->faker->unique()->numberBetween(10,39),
            //0 = deluxe, 1 = standard
            'roomSuite' => $this->faker->randomElement(['0', '1'],30),
            //0 = available, 1 = booked
            'status' => $this->faker->randomElement(['0', '1']),
        ];
    }
}
