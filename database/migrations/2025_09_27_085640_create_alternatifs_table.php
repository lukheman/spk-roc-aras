<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('alternatif', function (Blueprint $table) {
            $table->id('id_alternatif');
            $table->foreignId('id_siswa')->constrained('siswa', 'id_siswa')->cascadeOnDelete();
            $table->integer('nilai_akademik')->nullable()->default(0);
            $table->integer('prestasi_sertifikat')->nullable()->default(0);
            $table->integer('keaktifan_ekstrakurikuler')->nullable()->default(0);
            $table->integer('absensi')->nullable()->default(0);
            $table->integer('point_pelanggaran')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alternatif');
    }
};
