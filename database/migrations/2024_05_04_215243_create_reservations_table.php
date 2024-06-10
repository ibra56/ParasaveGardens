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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained();
            $table->foreignId('staff_id')->nullable()->constrained();
            $table->foreignId('room_price_id')->nullable()->constrained();
            $table->decimal('custom_price', 10, 2)->nullable();
            $table->dateTime('reservation_date')->nullable()->default(null);
            $table->dateTime('checkin_date')->nullable();
            $table->dateTime('checkout_date')->nullable();
            $table->integer('number_of_people')->nullable();
            $table->integer('number_of_days')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
