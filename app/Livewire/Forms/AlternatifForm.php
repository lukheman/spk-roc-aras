<?php

namespace App\Livewire\Forms;

use App\Models\Kriteria;
use App\Models\NilaiAlternatif;
use App\Models\Siswa;
use Livewire\Form;

class AlternatifForm extends Form
{
    public ?Siswa $siswa = null;

    // Dynamic array of criteria values: [id_kriteria => nilai]
    public array $nilai = [];

    public function rules(): array
    {
        $rules = [];
        foreach ($this->nilai as $id => $val) {
            $rules["nilai.{$id}"] = 'nullable|integer';
        }
        return $rules;
    }

    public function messages(): array
    {
        $messages = [];
        $kriteriaList = Kriteria::all()->keyBy('id_kriteria');
        foreach ($this->nilai as $id => $val) {
            $nama = $kriteriaList[$id]->nama ?? "Kriteria {$id}";
            $messages["nilai.{$id}.integer"] = "Nilai {$nama} harus berupa angka.";
        }
        return $messages;
    }

    public function store(): void
    {
        $this->validate();

        foreach ($this->nilai as $idKriteria => $nilaiValue) {
            NilaiAlternatif::updateOrCreate(
                [
                    'id_siswa' => $this->siswa->id_siswa,
                    'id_kriteria' => $idKriteria,
                ],
                [
                    'nilai' => $nilaiValue ?? 0,
                ]
            );
        }
        $this->reset();
    }

    public function update(): void
    {
        $this->store(); // Same logic: upsert all values
    }

    public function fillFromModel(Siswa $siswa): void
    {
        $this->siswa = $siswa;

        // Load all kriteria and fill values from existing data
        $kriteriaList = Kriteria::orderBy('kode')->get();
        $existingValues = $siswa->nilaiAlternatif->keyBy('id_kriteria');

        $this->nilai = [];
        foreach ($kriteriaList as $kriteria) {
            $this->nilai[$kriteria->id_kriteria] = $existingValues->has($kriteria->id_kriteria)
                ? $existingValues[$kriteria->id_kriteria]->nilai
                : null;
        }
    }
}
