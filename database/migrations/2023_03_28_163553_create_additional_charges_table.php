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
        Schema::create('additional_charges', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('guestID');
            $table->foreign('guestID')->references('id')->on('guests');
            $table->string('reason',50);
            $table->dateTime('date', $precision = 0);
            $table->float("subTotal");
            $table->float("total");
            $table->float("tax");
            $table->float("discount");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('additional_charges');
    }
};
