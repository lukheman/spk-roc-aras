<?php

namespace App\Livewire\Forms;

use App\Models\Alternatif;
use App\Models\Siswa;
use Illuminate\Validation\Rule;
use Livewire\Form;

class AlternatifForm extends Form
{
    public ?Siswa $siswa = null;

    public ?int $nilai_akademik = null;
    public ?int $prestasi_sertifikat = null;
    public ?int $keaktifan_ekstrakurikuler = null;
    public ?int $absensi = null;
    public ?int $point_pelanggaran = null;

    public function rules(): array
    {
        return [
            'nilai_akademik' => 'nullable|integer',
            'prestasi_sertifikat' => 'nullable|integer',
            'keaktifan_ekstrakurikuler' => 'nullable|integer',
            'absensi' => 'nullable|integer',
            'point_pelanggaran' => 'nullable|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'nilai_akademik.integer' => 'Nilai akademik harus berupa angka.',
            'prestasi_sertifikat.integer' => 'Nilai prestasi/sertifikat harus berupa angka.',
            'keaktifan_ekstrakurikuler.integer' => 'Nilai keaktifan ekstrakurikuler harus berupa angka.',
            'absensi.integer' => 'Nilai absensi harus berupa angka.',
            'point_pelanggaran.integer' => 'Nilai point pelanggaran harus berupa angka.',
        ];
    }

    public function store(): void
    {
        $this->siswa->alternatif()->create($this->validate());
        $this->reset();
    }

    public function update(): void
    {
        $this->siswa->alternatif->update($this->validate());
        $this->reset();
    }

    public function fillFromModel(Siswa $siswa): void
    {
        $this->siswa = $siswa;

        $this->nilai_akademik = $siswa->alternatif->nilai_akademik;
        $this->prestasi_sertifikat = $siswa->alternatif->prestasi_sertifikat;
        $this->keaktifan_ekstrakurikuler = $siswa->alternatif->keaktifan_ekstrakurikuler;
        $this->absensi = $siswa->alternatif->absensi;
        $this->point_pelanggaran = $siswa->alternatif->point_pelanggaran;
    }
}
