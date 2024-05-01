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
        Schema::create('medical', function (Blueprint $table) {
            $table->id();
            $table->string('medical_type');
            $table->decimal('latitude', 10, 7); // Decimal format for latitude
            $table->decimal('longitude', 10, 7); // Decimal format for longitude
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical');
    }
};
