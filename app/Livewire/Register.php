<?php

namespace App\Livewire;

use App\Models\Siswa;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('layouts.guest')]
class Register extends Component
{
    #[Validate('required|string|max:50|unique:siswa,nisn')]
    public $nisn;

    #[Validate('required|string|max:50')]
    public $nama;

    #[Validate('required|in:L,P')]
    public $jenis_kelamin;

    #[Validate('required|string|max:100')]
    public $tempat_lahir;

    #[Validate('required|date|before:today')]
    public $tanggal_lahir;

    #[Validate('required|string|max:50')]
    public $kelas;

    #[Validate('required|string|min:6|confirmed')]
    public $password;

    public $password_confirmation;

    public function register()
    {
        $this->validate();

        $siswa = Siswa::create([
            'nisn'          => $this->nisn,
            'nama'          => $this->nama,
            'jenis_kelamin' => $this->jenis_kelamin,
            'tempat_lahir'  => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir,
            'kelas'         => $this->kelas,
            'password'      => Hash::make($this->password),
        ]);

        $siswa->alternatif()->create([
            'id_siswa' => $siswa->id_siswa
        ]);

        flash('Registrasi berhasil! Silakan login.');

        return $this->redirectRoute('login', navigate: true);
    }

    public function render()
    {
        return view('livewire.register');
    }
}
