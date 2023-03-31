<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\rate>
 */
class RateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //0 = FB, 1 = BB
        $stayType = $this->faker->optional(weight: 0.5,default: true)->randomElement(['0', '1']);
        //0 = standard, 1 = deluxe
        $roomSuite = $this->faker->optional(weight: 0.5,default: true)->randomElement(['0', '1']);
        $price = 0;
        $standardFB = 25000;
        $standardBB = 15000;
        $deluxeFB = 40000;
        $deluxeBB = 25000;

        if($stayType == "0" && $roomSuite = "0"){
            $price = $standardFB;
        }else if ($stayType == "0" && $roomSuite = "1"){
            $price = $deluxeFB;
        }else if ($stayType == "1" && $roomSuite = "0"){
            $price = $standardBB;
        }else if ($stayType == "1" && $roomSuite = "1"){
            $price = $deluxeBB;
        }

        return [
            'stayType' => $stayType,
            'roomSuite' => $roomSuite,
            'price' => $price,
        ];
    }
}
