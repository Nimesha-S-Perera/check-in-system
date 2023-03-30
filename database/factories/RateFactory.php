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
        //0 = fb, 1 = bb
        $stayType = $this->faker->unique()->randomElement(['0', '1']);
        $standard = 0;
        $deluxe = 0;
        $standardFB = 25000;
        $standardBB = 15000;
        $deluxeFB = 40000;
        $deluxeBB = 25000;

        if($stayType == "0"){
            $standard = $standardFB;
            $deluxe = $deluxeFB;
        }else if ($stayType == "1"){
            $standard = $standardBB;
            $deluxe = $deluxeBB;
        }

        return [
            'stayType' => $stayType,
            'standard' => $standard,
            'deluxe' => $deluxe,
        ];
    }
}
