@php

use App\Enums\State;

@endphp
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-6">

                <!-- Modal Form -->
                <div class="modal fade" id="{{ $idModal }}" tabindex="-1" wire:ignore.self>
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content shadow-lg rounded-3">
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title text-white" id="myModalLabel1">
                                    @if ($currentState === \App\Enums\State::CREATE)
                                        Tambah Sub Kriteria
                                    @elseif ($currentState === \App\Enums\State::UPDATE)
                                        Perbarui Sub Kriteria
                                    @endif
                                </h5>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="row">
                                        <div class="col-12 mb-2">
                                            <div class="form-group">
                                                <label for="id_kriteria">Pilih Kriteria</label>
                                                <select wire:model="form.id_kriteria" class="form-control" id="id_kriteria">
                                                    <option value="">-- Pilih Kriteria --</option>
                                                    @foreach($this->kriteriaList as $k)
                                                        <option value="{{ $k->id_kriteria }}">{{ $k->kode }} - {{ $k->nama }}</option>
                                                    @endforeach
                                                </select>
                                                @error('form.id_kriteria')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="form-group">
                                                <label for="nama">Keterangan Sub Kriteria</label>
                                                <input wire:model="form.nama" type="text"
                                                    class="form-control" id="nama"
                                                    placeholder="Sangat Baik, Ya, Tidak...">
                                                @error('form.nama')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="nilai">Nilai</label>
                                                <input wire:model="form.nilai" type="number"
                                                    class="form-control" id="nilai"
                                                    placeholder="1, 2, 3...">
                                                @error('form.nilai')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                @if ($currentState === \App\Enums\State::CREATE)
                                    <button type="button" wire:click="save"
                                        class="btn btn-primary"><i class="bi bi-check-circle me-1"></i>Tambahkan</button>
                                @elseif ($currentState === \App\Enums\State::UPDATE)
                                    <button type="button" wire:click="save"
                                        class="btn btn-primary"><i class="bi bi-arrow-repeat me-1"></i>Perbarui</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                    <input type="text" wire:model.live="search" class="form-control" placeholder="Cari Sub Kriteria..."
                        aria-label="Cari sub kriteria" aria-describedby="button-addon2">
                </div>

            </div>

            <div class="col-6 d-flex justify-content-end align-items-center">
                <button wire:click="add" class="btn btn-primary"><i class="bi bi-plus-circle me-1"></i>Tambah Sub Kriteria</button>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kriteria</th>
                        <th>Keterangan Sub Kriteria</th>
                        <th>Nilai</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($this->subKriteria as $item)
                        <tr wire:key="{{ $item->id_sub_kriteria }}">
                            <td scope="row">{{ $loop->index + $this->subKriteria->firstItem() }}</td>
                            <td><span class="badge bg-secondary">{{ $item->kriteria->kode }}</span> {{ $item->kriteria->nama }}</td>
                            <td>{{ $item->nama }}</td>
                            <td><span class="badge bg-info">{{ $item->nilai }}</span></td>

                            <td class="text-end">
                                <button wire:click="edit({{ $item->id_sub_kriteria }})" class="btn btn-warning"><i class="bi bi-pencil-square me-1"></i>Edit</button>
                                <button wire:click="delete({{ $item->id_sub_kriteria }})" class="btn btn-danger" type="button"><i class="bi bi-trash me-1"></i>Hapus</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">Belum ada sub kriteria. Silakan tambahkan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <x-pagination :items="$this->subKriteria" />

    </div>
</div>
