<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kriteria = [
            ['kode' => 'C1', 'nama' => 'Absensi (Kehadiran)', 'tipe' => 'benefit', 'prioritas' => 1],
            ['kode' => 'C2', 'nama' => 'Nilai Akademik (Rata-rata Rapor)', 'tipe' => 'benefit', 'prioritas' => 2],
            ['kode' => 'C3', 'nama' => 'Keaktifan Ekstrakurikuler', 'tipe' => 'benefit', 'prioritas' => 3],
            ['kode' => 'C4', 'nama' => 'Point Pelanggaran', 'tipe' => 'cost', 'prioritas' => 4],
            ['kode' => 'C5', 'nama' => 'Prestasi / Sertifikat', 'tipe' => 'benefit', 'prioritas' => 5],
        ];

        foreach ($kriteria as $k) {
            Kriteria::updateOrCreate(
                ['kode' => $k['kode']],
                $k
            );
        }
    }
}
