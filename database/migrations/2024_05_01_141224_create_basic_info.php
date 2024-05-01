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
        Schema::create('basic_info', function (Blueprint $table) {
            $table->increments('id');
            $table->String('last_name');
            $table->String('first_name');
            $table->String('middle_name');
            $table->String('email');
            $table->String('contacts');
            $table->date('birthday');
            $table->String('position');
            $table->text('address');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('basic_info');
    }
};
