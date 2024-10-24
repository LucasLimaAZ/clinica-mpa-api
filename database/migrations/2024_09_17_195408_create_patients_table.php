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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('full_name');
            $table->string('responsible')->nullable();
            $table->string('referral')->nullable();
            $table->string('genre')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile_phone')->nullable();
            $table->string('business_phone')->nullable();
            $table->string('address')->nullable();
            $table->string('cep')->nullable();
            $table->string('city')->nullable();
            $table->string('uf')->nullable();
            $table->string('file_location')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('observations')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
