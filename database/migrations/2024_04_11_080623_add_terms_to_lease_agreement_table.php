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
        Schema::table('lease_agreements', function (Blueprint $table) {
            $table->string('terms_of_payment')->after('end_date');
            $table->string('agreed_payment')->after('end_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lease_agreements', function (Blueprint $table) {
            $table->dropColumn('terms_of_payment');
            $table->dropColumn('agreed_payment');
        });
    }
};
