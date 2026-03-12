@php

use App\Enums\State;

@endphp
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-6">

                <!-- Modal Form -->
                <div class="modal fade" id="{{ $idModal }}" tabindex="-1" wire:ignore.self>
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                        <div class="modal-content shadow-lg rounded-3">
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title text-white" id="myModalLabel1">
                                    Data Alternatif Siswa
                                </h5>
                                <button type="button" class="close rounded-pill"
                                    wire:click="$dispatch('closeModal', {id: 'modal-form-siswa'})">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-x">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </button>
                            </div>
                            <div class="modal-body">
<!-- FIX: modal tidak bisa tertutup -->
<form>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="nilai_akademik">Nilai Akademik (Rata-rata Rapor)</label>
                <input wire:model="form.nilai_akademik" type="number"
                    class="form-control" id="nilai_akademik"
                    @if ($currentState === \App\Enums\State::SHOW) disabled @endif>
                @error('form.nilai_akademik')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label for="prestasi_sertifikat">Prestasi / Sertifikat</label>
                <select wire:model="form.prestasi_sertifikat"
                    class="form-control" id="prestasi_sertifikat"
                    @if ($currentState === \App\Enums\State::SHOW) disabled @endif>
                    <option value="">-- Pilih --</option>
                    <option value="1">1 - Tidak Ada</option>
                    <option value="2">2 - Tingkat Sekolah</option>
                    <option value="3">3 - Tingkat Kab/Kota</option>
                    <option value="4">4 - Tingkat Prov/Nasional</option>
                </select>
                @error('form.prestasi_sertifikat')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-6">
            <div class="form-group">
                <label for="keaktifan_ekstrakurikuler">Keaktifan Ekstrakurikuler</label>
                <select wire:model="form.keaktifan_ekstrakurikuler"
                    class="form-control" id="keaktifan_ekstrakurikuler"
                    @if ($currentState === \App\Enums\State::SHOW) disabled @endif>
                    <option value="">-- Pilih --</option>
                    <option value="1">1 - Kurang</option>
                    <option value="2">2 - Cukup</option>
                    <option value="3">3 - Baik</option>
                    <option value="4">4 - Sangat Baik</option>
                </select>
                @error('form.keaktifan_ekstrakurikuler')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label for="absensi">Absensi (Kehadiran Siswa)</label>
                <input wire:model="form.absensi" type="number"
                    class="form-control" id="absensi"
                    @if ($currentState === \App\Enums\State::SHOW) disabled @endif>
                @error('form.absensi')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-6">
            <div class="form-group">
                <label for="point_pelanggaran">Point Pelanggaran</label>
                <input wire:model="form.point_pelanggaran" type="number"
                    class="form-control" id="point_pelanggaran"
                    @if ($currentState === \App\Enums\State::SHOW) disabled @endif>
                @error('form.point_pelanggaran')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
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
                        <tr wire:key="{{ $item->id }}">
                            <td scope="row">{{ $loop->index + $this->siswa->firstItem() }}</td>
                            <td>{{ $item->nisn }}</td>
                            <td>{{ $item->nama }}</td>

                            <td class="text-end">

                                <button wire:click="alternatif({{ $item->id_siswa }})" class="btn btn-sm btn-info"><i class="bi bi-list-columns me-1"></i>Alternatif</button>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <x-pagination :items="$this->siswa" />

    </div>
</div>
