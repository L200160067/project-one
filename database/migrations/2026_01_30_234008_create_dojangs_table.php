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
        Schema::create('dojangs', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama Dojang
            $table->string('contingent_name')->nullable(); // Nama Kontingen (jika beda)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dojangs');
    }
};
