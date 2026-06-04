@php

use App\Enums\State;

@endphp
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-4">

                <!-- Modal Form -->
                <div class="modal fade" id="{{ $idModal }}" tabindex="-1" wire:ignore.self>
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                        <div class="modal-content shadow-lg rounded-3">
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title text-white" id="myModalLabel1">
                                    Data Alternatif Siswa
                                </h5>
                            </div>
                            <div class="modal-body">
<form>
    <div class="row">
        @foreach ($this->kriteriaList as $kriteria)
            <div class="col-6 mb-3">
                <div class="form-group">
                    <label for="kriteria_{{ $kriteria->id_kriteria }}">
                        {{ $kriteria->kode }} - {{ $kriteria->nama }}
                        <span class="badge bg-{{ $kriteria->tipe === 'benefit' ? 'success' : 'warning' }} ms-1" style="font-size: 0.7em;">
                            {{ ucfirst($kriteria->tipe) }}
                        </span>
                    </label>
                    @if($kriteria->subKriteria->count() > 0)
                        <select wire:model="form.nilai.{{ $kriteria->id_kriteria }}" class="form-control" id="kriteria_{{ $kriteria->id_kriteria }}" @if ($currentState === \App\Enums\State::SHOW) disabled @endif>
                            <option value="">-- Pilih --</option>
                            @foreach($kriteria->subKriteria as $sub)
                                <option value="{{ $sub->nilai }}">{{ $sub->nama }} (Nilai: {{ $sub->nilai }})</option>
                            @endforeach
                        </select>
                    @else
                        <input wire:model="form.nilai.{{ $kriteria->id_kriteria }}" type="number"
                            class="form-control" id="kriteria_{{ $kriteria->id_kriteria }}"
                            @if ($currentState === \App\Enums\State::SHOW) disabled @endif>
                    @endif
                    @error("form.nilai.{$kriteria->id_kriteria}")
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        @endforeach
    </div>
</form>
                            </div>
                            <div class="modal-footer">
                                    <button type="button" wire:click="save"
                                        class="btn btn-primary"><i class="bi bi-check-circle me-1"></i>Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                    <input type="text" wire:model.live="search" class="form-control" placeholder="Cari Siswa..."
                        aria-label="Recipient's username" aria-describedby="button-addon2">
                </div>

            </div>

            <div class="col-8">
                @if (session()->has('message'))
                    <div class="alert alert-success py-2 mb-3">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="d-flex justify-content-end align-items-center gap-2">
                    <button wire:click="exportExcel" class="btn btn-success">
                        <i class="bi bi-file-earmark-excel me-1"></i> Export Format Excel
                    </button>
                    
                    <form wire:submit="importExcel" class="d-flex align-items-center gap-2 m-0">
                        <input type="file" wire:model="fileExcel" class="form-control" style="max-width: 250px;" required>
                        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled" wire:target="importExcel">
                            <i class="bi bi-upload me-1"></i> Import
                        </button>
                    </form>
                    
                    @error('fileExcel') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- <div class="col-6 d-flex justify-content-end"> -->
            <!--     <button wire:click="add" class="btn btn-primary me-3">Tambah Siswa</button> -->
            <!-- </div> -->
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NISN Siswa</th>
                        <th>Nama Siswa</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($this->siswa as $item)
                        <tr wire:key="{{ $item->id_siswa }}">
                            <td scope="row">{{ $loop->index + $this->siswa->firstItem() }}</td>
                            <td>{{ $item->nisn }}</td>
                            <td>{{ $item->nama }}</td>

                            <td class="text-end">

                                <button wire:click="alternatif({{ $item->id_siswa }})" class="btn btn-info"><i class="bi bi-list-columns me-1"></i>Kriteria</button>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <x-pagination :items="$this->siswa" />

    </div>
</div>
