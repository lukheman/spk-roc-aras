<?php

namespace App\Livewire;

use App\Models\Kriteria;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class Landing extends Component
{
    public int $jumlahKriteria = 0;

    public function mount()
    {
        $this->jumlahKriteria = Kriteria::count();
    }

    public function render()
    {
        return view('livewire.landing');
    }
}
