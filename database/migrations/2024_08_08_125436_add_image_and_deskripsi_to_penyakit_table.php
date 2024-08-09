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
        Schema::table('penyakits', function (Blueprint $table) {
            $table->string('image')->nullable(); // Menambahkan kolom image
            $table->text('deskripsi')->nullable(); // Menambahkan kolom deskripsi
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penyakits', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->dropColumn('deskripsi');
        });
    }
};
