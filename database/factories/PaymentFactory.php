<?php

namespace Database\Factories;

use App\Models\additionalCharge;
use App\Models\booking;
use App\Models\rate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $subTotal = $this->faker->biasedNumberBetween(30000,60000);
        $taxRate = $this->faker->randomElement(['10']);
        $tax = $taxRate / 100 * $subTotal;
        $total = $subTotal + $tax;

        return [
            'bookingID' => $this->faker->unique()->randomElement(booking::pluck('id')),
            'rateID' => $this->faker->randomElement(rate::pluck('id')),
            'additionalChargeID' => $this->faker->randomElement(additionalCharge::pluck('id')),
            'subTotal' => $subTotal,
            'taxRate' => $taxRate,
            'balance' => $this->faker->biasedNumberBetween(30000,60000),
            'total' => $total,
            'paymentMethod' => $this->faker->randomElement(['0','1','2']),
            'paymentDate' => $this->faker->dateTimeBetween($startDate = '+2 days', $endDate = '+5 days', $timezone = null),
        ];
    }
}
