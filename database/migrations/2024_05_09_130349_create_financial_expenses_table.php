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
        Schema::create('financial_expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('expense_category_item_id')->constrained('financial_expense_category_items', 'id');
            $table->decimal('amount', 15, 2);
            $table->string('narration')->nullable();
            $table->date('date_of_payment')->nullable()->comment('DoP');
            $table->foreignId('approved_by')->nullable()->default(null)->constrained('users');
            $table->foreignId('created_by')->constrained('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financial_expenses');
    }
};
