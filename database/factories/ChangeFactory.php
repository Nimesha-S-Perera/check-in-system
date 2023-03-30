<?php

namespace Database\Factories;

use App\Models\guest;
use App\Models\user;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\change>
 */
class ChangeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $columnName = $this->faker->randomElement(['name', 'nic','contact_number']);
        if($columnName == 'name'){
            $oldData = $this->faker->name;
            $newData = $this->faker->name;
        }else if($columnName == 'nic'){
            $oldData = $this->faker->regexify('[0-9]{9}[v]{1}');
            $newData = $this->faker->regexify('[0-9]{9}[v]{1}');
        }else if($columnName == 'contact_number'){
            $oldData = $this->faker->phoneNumber;
            $newData = $this->faker->phoneNumber;
        }

        return [
            'guestID' => $this->faker->randomElement(guest::pluck('id')),
            'userID' => $this->faker->randomElement(user::pluck('id')),
            'columnName' => $columnName,
            'oldData' => $oldData,
            'newData' => $newData,
            'changedDate' => $this->faker->dateTimeBetween($startDate = '+2 days', $endDate = '+5 days', $timezone = null),
        ];
    }
}
