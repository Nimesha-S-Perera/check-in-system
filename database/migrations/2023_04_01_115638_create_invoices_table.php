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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('bookingID');
            $table->foreign('bookingID')->references('id')->on('bookings');
            $table->unsignedBigInteger('packageID');
            $table->foreign('packageID')->references('id')->on('packages');
            $table->unsignedBigInteger('taxID')->nullable();
            $table->foreign('taxID')->references('id')->on('taxes');
            $table->float("total");
            $table->tinyInteger("status");
            $table->float("discount");
            $table->dateTime('paymentDate', $precision = 0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
