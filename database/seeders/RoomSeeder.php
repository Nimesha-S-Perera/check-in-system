<?php

namespace Database\Seeders;

use App\Models\room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        room::factory()->count(30)->create();
    }
}
