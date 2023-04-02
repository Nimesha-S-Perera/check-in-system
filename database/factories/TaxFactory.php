<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tax>
 */
class TaxFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //0 = VAT, 1 = GST
            'name' => $this->faker->unique()->randomElement(['0', '1']),
            'taxRate' => $this->faker->biasedNumberBetween(0,60),
        ];
    }
}
