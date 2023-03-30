<?php

namespace Database\Seeders;

use App\Models\change;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        change::factory()->count(2)->create();
    }
}
