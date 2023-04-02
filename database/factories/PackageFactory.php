<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $stayType = 1;
        $roomSuite = 1;
        $price = 25000;

        return [
            'stayType' => $stayType,
            'roomSuite' => $roomSuite,
            'price' => $price,
        ];
    }
}
