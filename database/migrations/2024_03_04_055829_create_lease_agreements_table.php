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
        Schema::create('lease_agreements', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Boarder::class);
            $table->foreignIdFor(\App\Models\Unit::class);
            $table->foreignIdFor(\App\Models\Room::class);
            $table->date('start_date');
            $table->date('end_date');
            $table->string('contract_document')->nullable();
            $table->boolean('includes_city_services')->default(0);
            $table->integer('months_deposit')->default(0);
            $table->integer('deposit_amount')->default(0);
            $table->boolean('deposit_refunded')->default(0);
            $table->boolean('will_renew')->default(0);
            $table->boolean('active')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lease_agreements');
    }
};
