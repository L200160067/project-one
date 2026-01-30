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
        Schema::create('divisions', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // "Under 45kg", "Tunggal", "Beregu"
            $table->string('type'); // 'weight' (untuk Kyorugi) atau 'performance' (untuk Poomsae/Seni)

            // Opsional: Untuk validasi berat badan nanti
            $table->integer('min_weight')->nullable();
            $table->integer('max_weight')->nullable();

            $table->string('gender_restriction')->nullable(); // 'male', 'female', null (bebas)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('divisions');
    }
};
