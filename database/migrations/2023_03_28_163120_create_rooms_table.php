<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id("roomNo");
            //0 => 'Standard', 1 => 'Deluxe'
            $table->tinyInteger('roomType');
            //$table->enum('roomType', [0 => 'Standard', 1 => 'Deluxe'])->nullable()->default(null);
            //0 => 'Available', 1 => 'Booked'
            $table->tinyInteger('roomType');
            //$table->enum('status', [0 => 'Available', 1 => 'Booked'])->nullable()->default(null);
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
