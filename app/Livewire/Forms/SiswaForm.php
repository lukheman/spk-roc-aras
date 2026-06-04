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
    public string $tempat_lahir = '';
    public string $tanggal_lahir = '';
    public string $kelas = '';

    public function rules(): array {
        return [
            'nisn' => [
                'required',
                Rule::unique('siswa', 'nisn')->ignore($this->siswa),
            ],
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => [
                'required',
            ],
            'kelas' => 'required',

        ];
    }

    public function messages(): array
    {
        return [
            'nisn.required' => 'NISN wajib diisi.',
            'nisn.unique' => 'NISN sudah terdaftar, silakan gunakan yang lain.',

            'nama.required' => 'Nama siswa wajib diisi.',

            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'kelas.required' => 'Kelas wajib diisi.',
        ];
    }

    public function store() {

        $this->validate();

        $siswa = Siswa::query()->create([
            'nisn' => $this->nisn,
            'nama' => $this->nama,
            'jenis_kelamin' => $this->jenis_kelamin,
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir,
            'kelas' => $this->kelas
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
        $this->tempat_lahir = $siswa->tempat_lahir;
        $this->tanggal_lahir = $siswa->tanggal_lahir;
        $this->kelas = $siswa->kelas;
    }

}
