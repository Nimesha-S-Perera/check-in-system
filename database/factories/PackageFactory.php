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
        $price = 0;
        $stayType = $this->faker->randomElement(
            array_merge(
                array_fill(0, 2, 'FB'),
                array_fill(0, 2, 'BB')
            )
        );

        $roomType = $this->faker->randomElement(
            array_merge(
                array_fill(0, 2, 'Standard'),
                array_fill(0, 2, 'Deluxe')
            )
        );

        $standardFB = 25000;
        $standardBB = 15000;
        $deluxeFB = 40000;
        $deluxeBB = 25000;

        if($stayType == "FB" && $roomType == "Standard"){
            $price = $standardFB;
        }else if($stayType == "FB" && $roomType == "Deluxe"){
            $price = $deluxeFB;
        }else if($stayType == "BB" && $roomType == "Standard"){
            $price = $standardBB;
        }else if($stayType == "BB" && $roomType == "Deluxe"){
            $price = $deluxeBB;
        }

        return [
            'stayType' => $stayType,
            'roomType' => $roomType,
            'price' => $price,
        ];
    }
}
