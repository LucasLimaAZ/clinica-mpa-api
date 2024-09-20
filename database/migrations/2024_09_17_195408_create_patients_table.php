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
            $table->string('responsible');
            $table->string('referral');
            $table->string('genre');
            $table->string('phone');
            $table->string('mobile_phone');
            $table->string('business_phone');
            $table->string('address');
            $table->string('cep');
            $table->string('city');
            $table->string('uf');
            $table->string('neighborhood');
            $table->string('observations');
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
