<?php

namespace App\Livewire;

use App\Models\Alternatif;
use App\Models\Siswa;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Dashboard')]
class Dashboard extends Component
{
    public $alternatif;
    public $siswa;

    public function mount()
    {
        $this->siswa = Siswa::count();
        $this->alternatif = Alternatif::count();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
