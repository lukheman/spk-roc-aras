<?php

namespace App\Exports;

use App\Models\Siswa;
use App\Models\Kriteria;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AlternatifExport implements FromCollection, WithHeadings, WithMapping
{
    private $kriteriaList;

    public function __construct()
    {
        $this->kriteriaList = Kriteria::orderBy('id_kriteria')->get();
    }

    public function collection()
    {
        return Siswa::with('nilaiAlternatif')->get();
    }

    public function headings(): array
    {
        $headings = [
            'NISN',
            'Nama Siswa',
            'Jenis Kelamin',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Kelas',
        ];

        foreach ($this->kriteriaList as $k) {
            $headings[] = $k->kode;
        }

        return $headings;
    }

    public function map($siswa): array
    {
        $row = [
            $siswa->nisn,
            $siswa->nama,
            $siswa->jenis_kelamin,
            $siswa->tempat_lahir,
            $siswa->tanggal_lahir,
            $siswa->kelas,
        ];

        foreach ($this->kriteriaList as $k) {
            $nilai = $siswa->nilaiAlternatif->where('id_kriteria', $k->id_kriteria)->first();
            $row[] = $nilai ? $nilai->nilai : 0;
        }

        return $row;
    }
}
