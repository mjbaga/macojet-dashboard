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
        Schema::create('boarders', function (Blueprint $table) {
            $table->id();

            $table->string('first_name');
            $table->string('last_name');
            $table->string('nickname')->nullable();
            $table->string('gender');
            $table->string('email')->nullable();
            $table->text('provincial_address');
            $table->string('profile_pic')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('fb_account_name')->nullable();
            $table->date('date_of_birth');
            $table->string('name_of_mother')->nullable();
            $table->string('mother_contact')->nullable();
            $table->string('name_of_father')->nullable();
            $table->string('father_contact')->nullable();
            $table->string('name_of_guardian')->nullable();
            $table->string('guardian_contact')->nullable();
            $table->string('profile_type')->nullable();
            $table->string('profileable_type')->nullable();
            $table->unsignedInteger('profileable_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boarders');
    }
};
