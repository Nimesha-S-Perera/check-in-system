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
        Schema::create('payments', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('bookingID');
            $table->foreign('bookingID')->references('id')->on('bookings');
            $table->unsignedBigInteger('rateID');
            $table->foreign('rateID')->references('id')->on('rates');
            $table->unsignedBigInteger('additionalChargeID')->nullable();
            $table->foreign('additionalChargeID')->references('id')->on('additional_charges');
            $table->float("subTotal");
            $table->float("taxRate");
            $table->float("total");
            $table->float("balance");
            $table->integer("paymentMethod");
            $table->dateTime('paymentDate', $precision = 0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
