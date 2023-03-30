<?php

namespace Database\Seeders;

use App\Models\rate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        rate::factory()->count(2)->create();
    }
}
