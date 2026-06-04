<?php

namespace App\Livewire\Table;

use App\Enums\State;
use App\Livewire\Forms\SubKriteriaForm;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use App\Traits\WithModal;
use App\Traits\WithNotify;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Kelola Sub Kriteria')]
class SubKriteriaTable extends Component
{
    use WithPagination;
    use WithNotify;
    use WithModal;

    public $currentState = State::CREATE;
    public string $idModal = 'modal-form-sub-kriteria';

    public SubKriteriaForm $form;
    public string $search = '';
    #[Computed]
    public function kriteriaList()
    {
        return Kriteria::orderBy('prioritas')->get();
    }

    #[Computed]
    public function subKriteria()
    {
        return SubKriteria::query()
            ->with('kriteria')
            ->when($this->search, function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%')
                      ->orWhereHas('kriteria', function($q) {
                          $q->where('nama', 'like', '%' . $this->search . '%');
                      });
            })
            ->orderBy('id_kriteria')
            ->orderBy('nilai', 'desc')
            ->paginate(10);
    }

    public function add()
    {
        $this->currentState = State::CREATE;
        $this->form->reset(['id_kriteria', 'nama', 'nilai', 'subKriteria']);
        $this->openModal($this->idModal);
    }

    public function edit($id)
    {
        $this->currentState = State::UPDATE;

        $subKriteria = SubKriteria::find($id);
        $this->form->fillFromModel($subKriteria);
        $this->openModal($this->idModal);
    }

    public function save()
    {
        if ($this->currentState === State::CREATE) {
            $this->form->store();
            $this->notifySuccess('Sub Kriteria berhasil ditambahkan!');
        } else {
            $this->form->update();
            $this->notifySuccess('Sub Kriteria berhasil diperbarui!');
        }

        $this->closeModal($this->idModal);
    }

    public function delete($id)
    {
        $subKriteria = SubKriteria::find($id);
        if ($subKriteria) {
            $subKriteria->delete();
            $this->notifySuccess('Sub Kriteria berhasil dihapus!');
        }
    }

    public function render()
    {
        return view('livewire.table.sub-kriteria-table');
    }
}
