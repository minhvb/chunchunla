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
        Schema::create('sleeps', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('start');
            $table->time('end');
            $table->enum('take_to_sleep_by', ['Bà', 'Bố', 'Mẹ', 'Cô']);
            $table->boolean('use_white_noise')->default(true);
            $table->boolean('change_diaper')->default(true);
            $table->boolean('burping')->default(true);
            $table->enum('place', ['giường', 'nôi', 'cũi', 'bế'])->default('giường');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sleeps');
    }
};
