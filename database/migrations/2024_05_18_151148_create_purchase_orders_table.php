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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplier_id')->constrained();
            $table->string('supplier_reference')->nullable()->default(null);
            $table->date('expected_arrival_date')->nullable()->default(null);
            $table->date('order_deadline_date')->nullable()->default(null);
            $table->date('received_date')->nullable()->default(null);
            $table->date('sent_date')->nullable()->default(null);
            $table->foreignId('created_by')->constrained('users');
            $table->text('staff_notes')->nullable()->default(null);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_orders');
    }
};
