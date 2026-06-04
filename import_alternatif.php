<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\DB;
use App\Models\Kriteria;

$kriteriaList = Kriteria::all()->keyBy('kode');

$rawData = [
    [6,6,89,1,2,97,4],
    [8,8,95,2,4,93,7],
    [9,9,98,2,3,97,7],
    [10,10,91,2,3,94,3],
    [11,11,89,2,3,98,1],
    [12,12,97,2,1,98,0],
    [13,13,96,2,3,97,3],
    [14,14,98,2,1,97,0],
    [15,15,91,2,3,97,7],
    [16,16,93,1,3,95,5],
    [17,17,88,3,2,96,1],
    [19,19,93,2,3,97,0],
    [25,25,88,2,4,95,3],
    [27,27,98,2,1,98,0],
    [28,28,91,1,2,98,0],
    [29,29,95,3,2,97,2],
    [30,30,84,2,2,98,3],
    [31,31,89,3,4,93,5],
    [32,32,96,2,2,98,0],
    [33,33,95,1,2,98,1],
    [34,34,89,2,3,95,6],
    [35,35,93,2,2,97,3],
    [36,36,88,2,4,97,5],
    [37,37,87,3,1,98,2],
    [38,38,89,2,3,94,6],
    [39,39,97,3,2,97,2],
    [40,40,88,2,2,96,3],
    [41,41,91,3,4,96,5],
    [42,42,91,3,2,97,2],
    [43,43,96,2,4,96,4],
    [44,44,98,2,4,90,1],
    [45,45,95,2,4,99,2],
    [46,46,93,3,4,96,3],
    [47,47,88,2,3,96,6],
    [48,48,97,2,3,99,1],
    [49,49,89,2,3,98,0],
    [50,50,91,2,3,98,1],
    [51,51,99,2,2,99,0],
    [52,52,96,2,3,95,3],
    [53,53,89,2,4,99,2],
    [54,54,90,2,3,96,5],
    [55,55,93,2,2,99,3],
    [56,56,92,2,3,95,3],
    [57,57,91,3,2,91,7],
    [59,59,90,2,4,99,5],
    [60,60,98,4,2,97,1],
    [61,61,85,3,2,95,1],
    [62,62,94,2,3,94,5],
    [63,63,89,2,2,92,7],
    [64,64,90,2,3,97,1],
    [65,65,91,2,3,95,3],
    [66,66,93,2,2,89,5],
    [67,67,87,2,4,99,1]
];

$inserts = [];
foreach ($rawData as $row) {
    $id_siswa = $row[1];
    
    // C2 (nilai_akademik)
    $inserts[] = ['id_siswa' => $id_siswa, 'id_kriteria' => $kriteriaList['C2']->id_kriteria, 'nilai' => $row[2]];
    // C5 (prestasi_sertifikat)
    $inserts[] = ['id_siswa' => $id_siswa, 'id_kriteria' => $kriteriaList['C5']->id_kriteria, 'nilai' => $row[3]];
    // C3 (keaktifan_ekstrakurikuler)
    $inserts[] = ['id_siswa' => $id_siswa, 'id_kriteria' => $kriteriaList['C3']->id_kriteria, 'nilai' => $row[4]];
    // C1 (absensi)
    $inserts[] = ['id_siswa' => $id_siswa, 'id_kriteria' => $kriteriaList['C1']->id_kriteria, 'nilai' => $row[5]];
    // C4 (point_pelanggaran)
    $inserts[] = ['id_siswa' => $id_siswa, 'id_kriteria' => $kriteriaList['C4']->id_kriteria, 'nilai' => $row[6]];
}

DB::table('alternatif')->insertOrIgnore($inserts);
echo "Selesai mengimpor nilai alternatif!";
