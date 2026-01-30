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
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            // Foreign Key Event (WAJIB ADA agar data antar tahun tidak campur)
            $table->foreignId('event_id')->constrained()->cascadeOnDelete();

            $table->foreignId('dojang_id')->constrained()->cascadeOnDelete();

            // Foreign Key Category (Agar dropdown input juara hanya munculkan atlet di kelas tsb)
            // Nullable karena mungkin saat import awal belum tau masuk kelas mana
            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();

            $table->string('name');
            $table->date('birth_date')->nullable();
            $table->string('gender'); // 'male', 'female'
            $table->integer('weight_kg')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
