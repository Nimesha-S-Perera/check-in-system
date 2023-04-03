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
            'roomType' => $this->faker->randomElement(array_merge(array_fill(0, 15, 'Standard'), array_fill(0, 15, 'Deluxe'))),
            'status' => $this->faker->randomElement(['Available', 'Booked']),
        ];
    }
}
