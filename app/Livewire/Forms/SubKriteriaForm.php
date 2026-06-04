<?php

namespace App\Livewire\Forms;

use App\Models\SubKriteria;
use Livewire\Form;

class SubKriteriaForm extends Form
{
    public ?SubKriteria $subKriteria = null;

    public ?int $id_kriteria = null;
    public string $nama = '';
    public ?int $nilai = null;

    public function rules(): array
    {
        return [
            'id_kriteria' => 'required|exists:kriteria,id_kriteria',
            'nama' => 'required|string|max:100',
            'nilai' => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'id_kriteria.required' => 'Kriteria harus dipilih.',
            'id_kriteria.exists' => 'Kriteria tidak valid.',
            'nama.required' => 'Nama sub kriteria harus diisi.',
            'nama.max' => 'Nama sub kriteria maksimal 100 karakter.',
            'nilai.required' => 'Nilai sub kriteria harus diisi.',
            'nilai.integer' => 'Nilai sub kriteria harus berupa angka.',
        ];
    }

    public function store(): void
    {
        SubKriteria::create([
            'id_kriteria' => $this->id_kriteria,
            'nama' => $this->nama,
            'nilai' => $this->nilai,
        ]);
        $this->reset(['nama', 'nilai', 'subKriteria']);
    }

    public function update(): void
    {
        $this->subKriteria->update($this->validate());
        $this->reset(['nama', 'nilai', 'subKriteria']);
    }

    public function fillFromModel(SubKriteria $subKriteria): void
    {
        $this->subKriteria = $subKriteria;
        $this->id_kriteria = $subKriteria->id_kriteria;
        $this->nama = $subKriteria->nama;
        $this->nilai = $subKriteria->nilai;
    }
}
