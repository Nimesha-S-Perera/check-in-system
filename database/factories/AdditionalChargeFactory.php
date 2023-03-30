<?php

namespace Database\Factories;

use App\Models\guest;
use App\Models\room;
use App\Models\user;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\additionalCharge>
 */
class AdditionalChargeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $subTotal = $this->faker->biasedNumberBetween(30000,60000);
        $taxRate = $this->faker->biasedNumberBetween(0,100);
        $tax = $taxRate / 100 * $subTotal;
        $total = $subTotal + $tax;

        return [
            'guestID' => $this->faker->unique()->randomElement(guest::pluck('id')),
            'reason' => $this->faker->randomElement(['Lunch','Damage']),
            'date' => $this->faker->dateTimeBetween($startDate = '-1 days', $endDate = 'now', $timezone = null),
            'subTotal' => $subTotal,
            'tax' => $taxRate,
            'total' => $total,
            'discount' => $this->faker->biasedNumberBetween(0,100),
        ];
    }
}
