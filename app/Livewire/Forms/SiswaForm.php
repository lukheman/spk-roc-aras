<?php

namespace App\Livewire\Forms;

use App\Models\Siswa;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class SiswaForm extends Form
{
    public ?Siswa $siswa = null;

    public string $nisn = '';
    public string $nama = '';
    public string $jenis_kelamin = '';
    public string $tanggal_lahir = '';

    public function rules(): array {
        return [
            'nisn' => [
                'required',
                Rule::unique('siswa', 'nisn')->ignore($this->siswa),
            ],
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => [
                'required',
            ],

        ];
    }

    public function messages(): array
    {
        return [
            'nisn.required' => 'NISN wajib diisi.',
            'nisn.unique' => 'NISN sudah terdaftar, silakan gunakan yang lain.',

            'nama.required' => 'Nama siswa wajib diisi.',

            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',

            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
        ];
    }

    public function store() {

        $this->validate();

        $siswa = Siswa::query()->create([
            'nisn' => $this->nisn,
            'nama' => $this->nama,
            'jenis_kelamin' => $this->jenis_kelamin,
            'tanggal_lahir' => $this->tanggal_lahir
        ]);

        $siswa->alternatif()->create([
            'id_siswa' => $siswa->id_siswa
        ]);

        $this->reset();
    }

    public function update() {
        $this->siswa->update($this->validate());
        $this->reset();

    }

    public function delete() {
        $this->siswa->delete();
    }

    public function fillFromModel(Siswa $siswa) {
        $this->siswa = $siswa;

        $this->nisn = $siswa->nisn;
        $this->nama = $siswa->nama;
        $this->jenis_kelamin = $siswa->jenis_kelamin;
        $this->tanggal_lahir = $siswa->tanggal_lahir;
    }

}
