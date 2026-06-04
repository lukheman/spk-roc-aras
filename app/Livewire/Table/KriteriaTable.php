<?php

namespace App\Livewire\Table;

use App\Enums\State;
use App\Livewire\Forms\KriteriaForm;
use App\Models\Kriteria;
use App\Traits\WithModal;
use App\Traits\WithNotify;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Kelola Kriteria')]
class KriteriaTable extends Component
{
    use WithPagination;
    use WithNotify;
    use WithModal;

    public $currentState = State::CREATE;
    public string $idModal = 'modal-form-kriteria';

    public KriteriaForm $form;

    public string $search = '';

    #[Computed]
    public function kriteria()
    {
        return Kriteria::query()
            ->when($this->search, function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%')
                    ->orWhere('kode', 'like', '%' . $this->search . '%');
            })
            ->orderBy('prioritas')
            ->paginate(10);
    }

    public function add()
    {
        $this->currentState = State::CREATE;
        $this->form->reset();
        $this->openModal($this->idModal);
    }

    public function edit($id)
    {
        $this->currentState = State::UPDATE;

        $kriteria = Kriteria::find($id);
        $this->form->fillFromModel($kriteria);
        $this->openModal($this->idModal);
    }

    public function save()
    {
        if ($this->currentState === State::CREATE) {
            $this->form->store();
            $this->notifySuccess('Kriteria berhasil ditambahkan!');
        } else {
            $this->form->update();
            $this->notifySuccess('Kriteria berhasil diperbarui!');
        }

        $this->closeModal($this->idModal);
        $this->form->reset();
    }

    public function delete($id)
    {
        $kriteria = Kriteria::find($id);
        if ($kriteria) {
            $kriteria->delete();
            $this->notifySuccess('Kriteria berhasil dihapus!');
        }
    }

    public function render()
    {
        return view('livewire.table.kriteria-table');
    }
}
