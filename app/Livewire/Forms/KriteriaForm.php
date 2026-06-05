<?php

namespace App\Livewire\Forms;

use App\Models\Kriteria;
use Livewire\Form;

class KriteriaForm extends Form
{
    public ?Kriteria $kriteria = null;

    public string $kode = '';
    public string $nama = '';
    public string $tipe = 'benefit';
    public int $prioritas = 0;
    public ?float $nilai_optimal = null;

    public function rules(): array
    {
        return [
            'kode' => 'required|string|max:10',
            'nama' => 'required|string|max:100',
            'tipe' => 'required|in:benefit,cost',
            'prioritas' => 'required|integer',
            'nilai_optimal' => 'nullable|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'kode.required' => 'Kode kriteria harus diisi.',
            'kode.max' => 'Kode kriteria maksimal 10 karakter.',
            'nama.required' => 'Nama kriteria harus diisi.',
            'nama.max' => 'Nama kriteria maksimal 100 karakter.',
            'tipe.required' => 'Tipe kriteria harus dipilih.',
            'tipe.in' => 'Tipe kriteria harus benefit atau cost.',
            'prioritas.required' => 'Prioritas kriteria harus diisi.',
            'prioritas.integer' => 'Prioritas kriteria harus berupa angka.',
            'nilai_optimal.numeric' => 'Nilai optimal harus berupa angka.',
        ];
    }

    public function store(): void
    {
        Kriteria::create($this->validate());
        $this->reset();
    }

    public function update(): void
    {
        $this->kriteria->update($this->validate());
        $this->reset();
    }

    public function delete(): void
    {
        $this->kriteria->delete();
        $this->reset();
    }

    public function fillFromModel(Kriteria $kriteria): void
    {
        $this->kriteria = $kriteria;
        $this->kode = $kriteria->kode;
        $this->nama = $kriteria->nama;
        $this->tipe = $kriteria->tipe;
        $this->prioritas = $kriteria->prioritas;
        $this->nilai_optimal = $kriteria->nilai_optimal;
    }
}
