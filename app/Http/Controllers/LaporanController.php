<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Helpers\SpkAras;

class LaporanController extends Controller
{

    public function hasilSeleksi()
    {

        $spkAras = new SpkAras();
        $siswaList = $spkAras->ranking();
        $siswaList = $siswaList->sortByDesc('skor')->values();

        $siswaLolos = $siswaList->take(30);

        foreach ($siswaList as $siswa) {
            $siswa->lolos = $siswaLolos->contains('id_siswa', $siswa->id_siswa);
        }

        $pdf = Pdf::loadView('laporan.laporan-hasil-seleksi', [
            'siswaList' => $siswaList,
        ]);

        return $pdf->download('laporan_hasil_seleksi_' . date('d_m_Y') . '.pdf');

    }
}
