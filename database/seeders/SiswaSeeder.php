<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Siswa as ModelSiswa;
use App\Models\Alternatif as ModelAlternatif;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data dari Tabel 2.3 Data Alternatif Calon Penerima Beasiswa
        // C1=Kehadiran(%), C2=Nilai Rapor, C3=Skor Ekskul, C4=Poin Pelanggaran, C5=Skor Prestasi
        $data = [
            ['nama' => 'Siswa A', 'absensi' => 98, 'nilai_akademik' => 88, 'keaktifan_ekstrakurikuler' => 3, 'point_pelanggaran' => 5, 'prestasi_sertifikat' => 2],
            ['nama' => 'Siswa B', 'absensi' => 100, 'nilai_akademik' => 93, 'keaktifan_ekstrakurikuler' => 4, 'point_pelanggaran' => 0, 'prestasi_sertifikat' => 4],
            ['nama' => 'Siswa C', 'absensi' => 90, 'nilai_akademik' => 85, 'keaktifan_ekstrakurikuler' => 2, 'point_pelanggaran' => 20, 'prestasi_sertifikat' => 1],
            ['nama' => 'Siswa D', 'absensi' => 95, 'nilai_akademik' => 82, 'keaktifan_ekstrakurikuler' => 2, 'point_pelanggaran' => 10, 'prestasi_sertifikat' => 1],
            ['nama' => 'Siswa E', 'absensi' => 96, 'nilai_akademik' => 90, 'keaktifan_ekstrakurikuler' => 3, 'point_pelanggaran' => 5, 'prestasi_sertifikat' => 3],
        ];

        foreach ($data as $d) {
            $siswa = ModelSiswa::create([
                'nisn' => fake()->unique()->numerify('3201####'),
                'nama' => $d['nama'],
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => fake()->date('Y-m-d', '-15 years'),
            ]);

            ModelAlternatif::create([
                'id_siswa' => $siswa->id_siswa,
                'nilai_akademik' => $d['nilai_akademik'],
                'prestasi_sertifikat' => $d['prestasi_sertifikat'],
                'keaktifan_ekstrakurikuler' => $d['keaktifan_ekstrakurikuler'],
                'absensi' => $d['absensi'],
                'point_pelanggaran' => $d['point_pelanggaran'],
            ]);
        }
    }
}
