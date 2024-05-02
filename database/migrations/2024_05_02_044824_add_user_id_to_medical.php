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
        Schema::table('medical', function (Blueprint $table) {
             // Add the foreign key constraint
             $table->unsignedBigInteger('user_id')->nullable();
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('medical', function (Blueprint $table) {
            $table->dropForeign('medical_user_id_foreign'); // Drop the foreign key constraint
            $table->dropColumn('user_id'); // Remove the user_id column
        });
    }
};
