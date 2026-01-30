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
        Schema::create('winners', function (Blueprint $table) {
            $table->id();
            // Relasi ke Kategori & Peserta
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('participant_id')->constrained()->cascadeOnDelete();

            // Data Kemenangan
            $table->string('medal'); // 'gold', 'silver', 'bronze'
            $table->integer('points')->default(0); // 5, 3, 1 (Hardcode saat insert)
            $table->timestamps();

            // Validasi DB: Satu orang tidak boleh dapat 2 medali di kategori yang sama
            $table->unique(['category_id', 'participant_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('winners');
    }
};
