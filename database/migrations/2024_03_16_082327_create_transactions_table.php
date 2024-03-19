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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transactable_type')->nullable();
            $table->unsignedInteger('transactable_id')->nullable()->nullOnDelete();
            $table->string('transaction_type');
            $table->float('amount', 8,2);
            $table->string('payment_method');
            $table->date('date_of_payment')->nullable();
            $table->string('proof_of_payment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
