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
            $table->boolean('includes_city_services');
            $table->integer('months_deposit');
            $table->boolean('deposit_refunded');
            $table->boolean('will_renew');
            $table->timestamps();
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
