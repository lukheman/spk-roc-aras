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

    public $spkData = [];

    public $laporan;

    public function mount()
    {

        $spkAras = new SpkAras();
        $this->siswaList = $spkAras->ranking();

        $this->spkData = [
            'criteriaList' => $spkAras->getCriteriaList(),
            'weights' => $spkAras->getWeights(),
            'matrixDecision' => $spkAras->matrixDecision,
            'optimalValues' => $spkAras->optimalValues,
            'matrixNormalized' => $spkAras->matrixNormalized,
            'matrixWeighted' => $spkAras->matrixWeighted,
            's0' => $spkAras->getS0(),
            'unsortedSiswa' => $spkAras->siswaList,
        ];

        $this->siswaList = $this->siswaList->sortByDesc('skor')->values();

        $siswaLolos = $this->siswaList->take(30);

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
