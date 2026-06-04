@php

    use App\Enums\State;

@endphp
<div>
<div class="card mb-4">
    <div class="card-header">
        <div class="row">

            <div class="col-6">
                @if ($laporan)

                    <a href="{{ route('laporan-hasil-seleksi')}}" class="btn btn-danger me-3">

                        <i class="bi bi-printer"></i>
                        Download Laporan</a>

                @else

                    <p class="fw-semibold text-primary mb-3">
                        Berikut adalah daftar hasil seleksi siswa beserta status kelulusannya:
                    </p>

                    <!-- <div class="input-group"> -->
                    <!--     <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span> -->
                    <!--     <input type="text" wire:model.live="search" class="form-control" placeholder="Cari siswa..." -->
                    <!--         aria-label="Recipient's username" aria-describedby="button-addon2"> -->
                    <!-- </div> -->

                @endif
            </div>
            <div class="col-6">


                <!-- Modal Form -->
                <div class="modal fade" id="{{ $idModal }}" tabindex="-1" wire:ignore.self>
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content shadow-lg rounded-3">
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title text-white" id="myModalLabel1">
                                    @if ($currentState === \App\Enums\State::CREATE)
                                        Tambah Ranking
                                    @elseif ($currentState === \App\Enums\State::UPDATE)
                                        Perbarui Ranking
                                    @elseif ($currentState === \App\Enums\State::SHOW)
                                        Detail Ranking
                                    @endif
                                </h5>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="nisn">NISN Ranking</label>
                                                <input wire:model="form.nisn" type="text" class="form-control" id="nisn"
                                                    @if ($currentState === \App\Enums\State::SHOW) disabled @endif>
                                                @error('form.nisn')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="form-group">
                                                <label for="nama">Nama Ranking</label>
                                                <input wire:model="form.nama" type="text" class="form-control" id="nama"
                                                    @if ($currentState === \App\Enums\State::SHOW) disabled @endif>
                                                @error('form.nama')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="nama">Status Ekonomi</label>
                                                <input wire:model="form.status_ekonomi" type="text" class="form-control"
                                                    id="nama" @if ($currentState === \App\Enums\State::SHOW) disabled
                                                    @endif>
                                                @error('form.status_ekonomi')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="nama">Phone</label>
                                                <input wire:model="form.phone" type="text" class="form-control"
                                                    id="nama" @if ($currentState === \App\Enums\State::SHOW) disabled
                                                    @endif>
                                                @error('form.phone')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                @if ($currentState === \App\Enums\State::CREATE)
                                    <button type="button" wire:click="save" class="btn btn-primary"><i
                                            class="bi bi-check-circle me-1"></i>Tambahkan</button>
                                @elseif ($currentState === \App\Enums\State::UPDATE)
                                    <button type="button" wire:click="save" class="btn btn-primary"><i
                                            class="bi bi-arrow-repeat me-1"></i>Perbarui</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header bg-primary text-white">
        <h5 class="card-title mb-0 text-white">Langkah 1: Matriks Keputusan & Nilai Optimal / Ideal (A0)</h5>
    </div>
    <div class="card-body mt-3">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Alternatif</th>
                        @foreach($spkData['criteriaList'] as $c)
                            <th>{{ $c->kode }} ({{ $c->nama }})</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-info fw-bold">
                        <td>A0 (Ideal)</td>
                        @foreach($spkData['optimalValues'] as $opt)
                            <td>{{ $opt }}</td>
                        @endforeach
                    </tr>
                    @foreach($spkData['unsortedSiswa'] as $index => $siswa)
                        <tr>
                            <td>{{ $siswa->nama }}</td>
                            @foreach($spkData['matrixDecision'][$index] as $val)
                                <td>{{ $val }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header bg-primary text-white">
        <h5 class="card-title mb-0 text-white">Langkah 2: Normalisasi Matriks</h5>
    </div>
    <div class="card-body mt-3">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Alternatif</th>
                        @foreach($spkData['criteriaList'] as $c)
                            <th>{{ $c->kode }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-info fw-bold">
                        <td>A0 (Ideal)</td>
                        @foreach($spkData['matrixNormalized'][0] as $val)
                            <td>{{ $val }}</td>
                        @endforeach
                    </tr>
                    @foreach($spkData['unsortedSiswa'] as $index => $siswa)
                        <tr>
                            <td>{{ $siswa->nama }}</td>
                            @foreach($spkData['matrixNormalized'][$index + 1] as $val)
                                <td>{{ $val }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header bg-primary text-white">
        <h5 class="card-title mb-0 text-white">Langkah 3: Matriks Terbobot</h5>
    </div>
    <div class="card-body mt-3">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Alternatif</th>
                        @foreach($spkData['criteriaList'] as $c)
                            <th>{{ $c->kode }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-info fw-bold">
                        <td>A0 (Ideal)</td>
                        @foreach($spkData['matrixWeighted'][0] as $val)
                            <td>{{ $val }}</td>
                        @endforeach
                    </tr>
                    @foreach($spkData['unsortedSiswa'] as $index => $siswa)
                        <tr>
                            <td>{{ $siswa->nama }}</td>
                            @foreach($spkData['matrixWeighted'][$index + 1] as $val)
                                <td>{{ $val }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header bg-primary text-white">
        <h5 class="card-title mb-0 text-white">Langkah 4: Nilai Fungsi Optimalitas (Si) dan Derajat Utilitas (Ki)</h5>
    </div>
    <div class="card-body mt-3">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Alternatif</th>
                        <th>Nilai Fungsi Optimalitas (Si)</th>
                        <th>Derajat Utilitas (Ki)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-info fw-bold">
                        <td>A0 (Ideal)</td>
                        <td>{{ $spkData['s0'] }}</td>
                        <td>1</td>
                    </tr>
                    @foreach($spkData['unsortedSiswa'] as $siswa)
                        <tr>
                            <td>{{ $siswa->nama }}</td>
                            <td>{{ $siswa->si }}</td>
                            <td>{{ $siswa->skor }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header bg-success text-white">
        <h5 class="card-title mb-0 text-white">Langkah 5: Hasil Akhir Perengkingan Siswa</h5>
    </div>
    <div class="card-body mt-3">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NISN Siswa</th>
                        <th>Nama Siswa</th>
                        <th>Skor</th>
                        <th class="text-end">Dinyatakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswaList as $item)
                        <tr wire:key="{{ $item->id }}">
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $item->nisn }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->skor }}</td>
                            <td class="text-end"><span
                                    class="badge bg-{{ $item->lolos ? 'success' : 'danger'}}">{{  $item->lolos ? 'LOLOS' : 'TIDAK LOLOS' }}</span>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>