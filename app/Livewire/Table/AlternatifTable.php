<?php

namespace App\Livewire\Table;

use App\Enums\State;
use App\Livewire\Forms\AlternatifForm;
use App\Models\Kriteria;
use App\Models\Siswa;
use App\Traits\WithModal;
use App\Traits\WithNotify;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AlternatifExport;
use App\Imports\AlternatifImport;

#[Title('Nilai Alternatif')]
class AlternatifTable extends Component
{

    use WithPagination, WithFileUploads;
    use WithNotify;
    use WithModal;


    public $currentState = State::CREATE;
    public string $idModal = 'modal-form-siswa';

    public AlternatifForm $form;

    public string $search = '';
    public $fileExcel;

    public function exportExcel()
    {
        return Excel::download(new AlternatifExport, 'format_nilai_alternatif.xlsx');
    }

    public function importExcel()
    {
        $this->validate([
            'fileExcel' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(new AlternatifImport, $this->fileExcel->getRealPath());

        $this->reset('fileExcel');
        session()->flash('message', 'Data nilai alternatif berhasil diimport!');
    }

    #[Computed]
    public function siswa() {
        return Siswa::query()
            ->with('nilaiAlternatif')
            ->when($this->search, function($query) {
                $query->where('nama', 'like', '%'.$this->search.'%');
            })
            ->latest()
            ->paginate(10);
    }

    #[Computed]
    public function kriteriaList() {
        return Kriteria::with('subKriteria')->orderBy('prioritas')->get();
    }

    public function save()
    {

        $this->form->update();
        $this->notifySuccess('Data alternatif berhasil diperbarui!');

        $this->closeModal($this->idModal);
        $this->form->reset();

    }

    public function alternatif($id) {

        $this->currentState = State::CREATE;

        $siswa = Siswa::with('nilaiAlternatif')->find($id);

        $this->form->fillFromModel($siswa);
        $this->openModal($this->idModal);

    }

    public function render()
    {
        return view('livewire.table.alternatif-table');
    }
}
