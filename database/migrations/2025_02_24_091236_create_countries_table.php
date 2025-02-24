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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Country name
            $table->string('iso2', 2)->unique(); // 2-letter country code (AF, US, etc.)
            $table->string('currency')->nullable(); // Currency code (AFN, USD, etc.)
            $table->string('currency_name')->nullable(); // Full currency name
            $table->string('currency_symbol')->nullable(); // Symbol (؋, $, etc.)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
