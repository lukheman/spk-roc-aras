<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Siswa as ModelSiswa;
use App\Models\Kriteria;
use App\Models\NilaiAlternatif;

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
            ['nama' => 'Siswa A', 'C1' => 98, 'C2' => 88, 'C3' => 3, 'C4' => 5, 'C5' => 2],
            ['nama' => 'Siswa B', 'C1' => 100, 'C2' => 93, 'C3' => 4, 'C4' => 0, 'C5' => 4],
            ['nama' => 'Siswa C', 'C1' => 90, 'C2' => 85, 'C3' => 2, 'C4' => 20, 'C5' => 1],
            ['nama' => 'Siswa D', 'C1' => 95, 'C2' => 82, 'C3' => 2, 'C4' => 10, 'C5' => 1],
            ['nama' => 'Siswa E', 'C1' => 96, 'C2' => 90, 'C3' => 3, 'C4' => 5, 'C5' => 3],
        ];

        $kriteriaList = Kriteria::all()->keyBy('kode');

        foreach ($data as $d) {
            $siswa = ModelSiswa::create([
                'nisn' => fake()->unique()->numerify('3201####'),
                'nama' => $d['nama'],
                'jenis_kelamin' => 'P',
                'tempat_lahir' => fake()->city(),
                'tanggal_lahir' => fake()->date('Y-m-d', '-15 years'),
                'kelas' => 'XII',
            ]);

            foreach ($kriteriaList as $kode => $kriteria) {
                NilaiAlternatif::create([
                    'id_siswa' => $siswa->id_siswa,
                    'id_kriteria' => $kriteria->id_kriteria,
                    'nilai' => $d[$kode] ?? 0,
                ]);
            }
        }
    }
}
