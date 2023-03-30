<?php

namespace Database\Seeders;

use App\Models\additionalCharge;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdditionalChargeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        additionalCharge::factory()->count(3)->create();
    }
}
