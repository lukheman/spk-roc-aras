<?php

namespace App\Livewire;

use App\Models\Kriteria;
use App\Models\NilaiAlternatif;
use App\Models\Siswa;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Dashboard')]
class Dashboard extends Component
{
    public $kriteria;
    public $siswa;

    public function mount()
    {
        $this->siswa = Siswa::count();
        $this->kriteria = Kriteria::count();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
