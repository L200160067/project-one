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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            // Foreign Keys (Relasi ke Master Data)
            $table->foreignId('event_id')->constrained()->cascadeOnDelete();
            $table->foreignId('age_group_id')->constrained();
            $table->foreignId('division_id')->constrained();

            // ENUM Columns (Disimpan sebagai String agar performa cepat & fleksibel)
            $table->string('gender');     // 'male', 'female', 'mixed'
            $table->string('discipline'); // 'kyorugi', 'poomsae'
            $table->string('level');      // 'prestasi', 'festival'

            // THE LIFESAVER (Kolom Cache Nama)
            // Berisi string gabungan: "Kyorugi Prestasi Junior Male U-45kg"
            // Diisi otomatis oleh Model (Lihat Bagian 2 di bawah)
            $table->string('name_label');
            $table->timestamps();

            // CONSTRAINT ANTI-DUPLIKASI (SATU EVENT TIDAK BOLEH ADA KELAS KEMBAR)
            $table->unique(
                ['event_id', 'age_group_id', 'division_id', 'gender', 'discipline', 'level'],
                'unique_category_constraint' // Nama index
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
