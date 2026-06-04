<?php

namespace App\Imports;

use App\Models\Siswa;
use App\Models\Kriteria;
use App\Models\NilaiAlternatif;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class AlternatifImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        $kriteriaList = Kriteria::orderBy('id_kriteria')->get();

        // Skip header row
        $rows->shift();

        foreach ($rows as $row) {
            $nisn = $row[0] ?? null;
            if (!$nisn) continue;

            // Pastikan format NISN string dengan panjang 10 digit, tambahkan 0 di depan jika terpotong Excel
            $nisn = str_pad($nisn, 10, '0', STR_PAD_LEFT);

            // Handle format tanggal Excel
            $tanggalLahir = $row[4] ?? now()->format('Y-m-d');
            if (is_numeric($tanggalLahir)) {
                try {
                    $tanggalLahir = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($tanggalLahir)->format('Y-m-d');
                } catch (\Exception $e) {
                    $tanggalLahir = now()->format('Y-m-d');
                }
            }

            $siswa = Siswa::updateOrCreate(
                ['nisn' => $nisn],
                [
                    'nama' => $row[1] ?? 'Tanpa Nama',
                    'jenis_kelamin' => $row[2] ?? 'L',
                    'tempat_lahir' => $row[3] ?? null,
                    'tanggal_lahir' => $tanggalLahir,
                    'kelas' => $row[5] ?? null,
                ]
            );

            if ($siswa) {
                $kriteriaIndex = 6;
                foreach ($kriteriaList as $k) {
                    $nilai = isset($row[$kriteriaIndex]) ? $row[$kriteriaIndex] : 0;
                    
                    NilaiAlternatif::updateOrCreate(
                        [
                            'id_siswa' => $siswa->id_siswa,
                            'id_kriteria' => $k->id_kriteria
                        ],
                        [
                            'nilai' => $nilai
                        ]
                    );

                    $kriteriaIndex++;
                }
            }
        }
    }
}
