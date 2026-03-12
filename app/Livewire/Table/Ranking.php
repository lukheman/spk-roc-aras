<?php

namespace App\Livewire\Table;

use App\Enums\State;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Helpers\SpkAras;

#[Title('Ranking')]
class Ranking extends Component
{
    public $siswaList;

    public $currentState = State::CREATE;
    public string $idModal = 'modal-form-siswa';

    public $laporan;

    public function mount()
    {

        $spkAras = new SpkAras();
        $this->siswaList = $spkAras->ranking();
        $this->siswaList = $this->siswaList->sortByDesc('skor')->values();

        $siswaLolos = $this->siswaList->take(3);

        foreach ($this->siswaList as $siswa) {
            if ($siswaLolos->contains('id_siswa', $siswa->id_siswa)) {
                $siswa->lolos = true;
            } else {
                $siswa->lolos = false;
            }
        }

    }

    public function render()
    {
        return view('livewire.table.ranking');
    }
}
