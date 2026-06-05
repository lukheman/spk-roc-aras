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
                                        Tambah Kriteria
                                    @elseif ($currentState === \App\Enums\State::UPDATE)
                                        Perbarui Kriteria
                                    @endif
                                </h5>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="kode">Kode Kriteria</label>
                                                <input wire:model="form.kode" type="text"
                                                    class="form-control" id="kode"
                                                    placeholder="C1, C2, ...">
                                                @error('form.kode')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="form-group">
                                                <label for="nama">Nama Kriteria</label>
                                                <input wire:model="form.nama" type="text"
                                                    class="form-control" id="nama"
                                                    placeholder="Nama kriteria">
                                                @error('form.nama')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="tipe">Tipe Kriteria</label>
                                                <select wire:model="form.tipe"
                                                    class="form-control" id="tipe">
                                                    <option value="benefit">Benefit (lebih tinggi lebih baik)</option>
                                                    <option value="cost">Cost (lebih rendah lebih baik)</option>
                                                </select>
                                                @error('form.tipe')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="prioritas">Prioritas</label>
                                                <input wire:model="form.prioritas" type="number"
                                                    class="form-control" id="prioritas"
                                                    placeholder="1, 2, 3...">
                                                @error('form.prioritas')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row mt-2">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="nilai_optimal">Nilai Optimal (Opsional)</label>
                                                <input wire:model="form.nilai_optimal" type="number" step="0.01"
                                                    class="form-control" id="nilai_optimal"
                                                    placeholder="Biarkan kosong agar dihitung otomatis">
                                                <small class="text-muted d-block mt-1">Jika diisi, nilai ini akan digunakan sebagai nilai A0 (Ideal). Jika kosong, sistem akan mengambil nilai min/max dari alternatif secara otomatis.</small>
                                                @error('form.nilai_optimal')
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
                    <input type="text" wire:model.live="search" class="form-control" placeholder="Cari Kriteria..."
                        aria-label="Cari kriteria" aria-describedby="button-addon2">
                </div>

            </div>

            <div class="col-6 d-flex justify-content-end">
                <button wire:click="add" class="btn btn-primary me-3"><i class="bi bi-plus-circle me-1"></i>Tambah Kriteria</button>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode</th>
                        <th>Nama Kriteria</th>
                        <th>Tipe</th>
                        <th>Prioritas</th>
                        <th>Nilai Optimal (A0)</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($this->kriteria as $item)
                        <tr wire:key="{{ $item->id_kriteria }}">
                            <td scope="row">{{ $loop->index + $this->kriteria->firstItem() }}</td>
                            <td><span class="badge bg-secondary">{{ $item->kode }}</span></td>
                            <td>{{ $item->nama }}</td>
                            <td>
                                <span class="badge bg-{{ $item->tipe === 'benefit' ? 'success' : 'warning' }}">
                                    {{ ucfirst($item->tipe) }}
                                </span>
                            </td>
                            <td>{{ $item->prioritas }}</td>
                            <td>{{ $item->nilai_optimal ?? 'Otomatis' }}</td>

                            <td class="text-end">
                                <button wire:click="edit({{ $item->id_kriteria }})" class="btn btn-warning"><i class="bi bi-pencil-square me-1"></i>Edit</button>
                                <button wire:click="delete({{ $item->id_kriteria }})" class="btn btn-danger" type="button"><i class="bi bi-trash me-1"></i>Hapus</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <x-pagination :items="$this->kriteria" />

    </div>
</div>
