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
        Schema::create('eats', function (Blueprint $table) {
            $table->id();
            $table->enum('milk_type', ['Sữa Mẹ', 'NaN', 'Meiji'])->default('Sữa mẹ');
            $table->unsignedBigInteger('amount');
            $table->date('date');
            $table->time('start');
            $table->time('end');
            $table->enum('fed_by', ['Bà', 'Bố', 'Mẹ', 'Cô'])->default('Mẹ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eats');
    }
};
