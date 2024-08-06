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
        Schema::create('laporan__bulanans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_peternak');
            $table->foreignId('kdPenyakit')->constrained('penyakits')->cascadeOnDelete();
            $table->date('Tanggal_Diagnosa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan__bulanans');
    }
};
