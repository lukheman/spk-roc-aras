<?php
namespace App\Helpers;

use App\Models\Alternatif;
use App\Models\Siswa;

class SpkAras
{

    public $siswaList;
    public $weights = [];
    public $criteriaTypes = [];
    public $s0 = 0;

    // Urutan kriteria: C1=absensi, C2=nilai_akademik, C3=keaktifan_ekstrakurikuler, C4=point_pelanggaran, C5=prestasi_sertifikat
    public $criteriaColumns = [
        'nilai_akademik',             // C2 - Nilai Rapor - benefit
        'prestasi_sertifikat',        // C5 - Skor Prestasi - benefit
        'keaktifan_ekstrakurikuler',  // C3 - Skor Ekskul - benefit
        'absensi',                    // C1 - Kehadiran (%) - benefit
        'point_pelanggaran',          // C4 - Poin Pelanggaran - cost
    ];

    public function __construct()
    {
        $this->siswaList = Siswa::query()->has('alternatif')->with('alternatif')->get();

        // Tipe kriteria: benefit (lebih tinggi lebih baik) atau cost (lebih rendah lebih baik)
        $this->criteriaTypes = [
            'benefit', // C1 - absensi
            'benefit', // C2 - nilai_akademik
            'benefit', // C3 - keaktifan_ekstrakurikuler
            'cost',    // C4 - point_pelanggaran
            'benefit', // C5 - prestasi_sertifikat
        ];

        // Hitung bobot menggunakan metode ROC (Rank Order Centroid)
        $this->hitungBobotROC();
    }

    public function ranking()
    {
        // Langkah 1: Bentuk matriks keputusan & tentukan nilai optimal (A0)
        $matrix = $this->bentukMatriks();
        $optimal = $this->tentukanNilaiOptimal($matrix);

        // Langkah 2: Normalisasi matriks
        $normalizedMatrix = $this->normalisasiMatriks($matrix, $optimal);

        // Langkah 3: Hitung matriks normalisasi terbobot
        $weightedMatrix = $this->hitungMatriksTerbobot($normalizedMatrix);

        // Langkah 4: Hitung nilai fungsi optimalitas (Si)
        $this->hitungNilaiOptimalitas($weightedMatrix);

        // Langkah 5: Hitung derajat utilitas (Ki)
        $this->hitungDerajatUtilitas();

        return $this->siswaList;
    }

    /**
     * Hitung bobot ROC (Rank Order Centroid) untuk 5 kriteria
     */
    private function hitungBobotROC()
    {
        $n = count($this->criteriaColumns);

        for ($i = 1; $i <= $n; $i++) {
            $sum = 0;
            for ($j = $i; $j <= $n; $j++) {
                $sum += 1 / $j;
            }
            $this->weights[$i - 1] = round($sum / $n, 3);
        }
    }

    /**
     * Langkah 1: Bentuk matriks keputusan
     */
    private function bentukMatriks(): array
    {
        $matrix = [];

        foreach ($this->siswaList as $siswa) {
            $row = [];
            foreach ($this->criteriaColumns as $col) {
                $row[] = (float) ($siswa->alternatif?->$col ?? 0);
            }
            $matrix[] = $row;
        }

        return $matrix;
    }

    /**
     * Tentukan nilai optimal A0
     * Benefit: max, Cost: min
     */
    private function tentukanNilaiOptimal(array $matrix): array
    {
        $optimal = [];
        $criteriaCount = count($this->criteriaColumns);

        for ($j = 0; $j < $criteriaCount; $j++) {
            $colValues = array_column($matrix, $j);

            if ($this->criteriaTypes[$j] === 'benefit') {
                $optimal[$j] = max($colValues);
            } else {
                $optimal[$j] = min($colValues) == 0.0 ? 1 : min($colValues);
            }
        }

        return $optimal;
    }

    /**
     * Langkah 2: Normalisasi matriks
     * Benefit: x_ij / sum(x_ij) termasuk A0
     * Cost: (1/x_ij) / sum(1/x_ij) termasuk A0
     */
    private function normalisasiMatriks(array $matrix, array $optimal): array
    {
        $criteriaCount = count($this->criteriaColumns);

        // Gabungkan A0 dengan alternatif lainnya
        $allRows = array_merge([$optimal], $matrix);
        $normalized = [];

        for ($j = 0; $j < $criteriaCount; $j++) {
            if ($this->criteriaTypes[$j] === 'benefit') {
                $sum = 0;
                foreach ($allRows as $row) {
                    $sum += $row[$j];
                }

                foreach ($allRows as $i => $row) {
                    $normalized[$i][$j] = $sum > 0 ? round($row[$j] / $sum, 3) : 0;
                }
            } else {
                // Cost: gunakan 1/x_ij
                $sum = 0;
                foreach ($allRows as $row) {
                    // $val = $row[$j] > 0 ? 1 / $row[$j] : 0;
                    $val = $row[$j] > 0 ? 1 / $row[$j] : 1 / 1;
                    $sum += $val;
                }
                foreach ($allRows as $i => $row) {
                    $val = $row[$j] > 0 ? 1 / $row[$j] : 1 / 1;
                    $normalized[$i][$j] = round($val / $sum, 3);
                }

            }

        }

        return $normalized;
    }

    /**
     * Langkah 3: Hitung matriks normalisasi terbobot
     * v_ij = w_j * x_norm_ij
     */
    private function hitungMatriksTerbobot(array $normalizedMatrix): array
    {
        $weighted = [];

        foreach ($normalizedMatrix as $i => $row) {
            foreach ($row as $j => $val) {
                $weighted[$i][$j] = round($val * $this->weights[$j], 3);
            }
        }

        return $weighted;
    }

    /**
     * Langkah 4: Hitung nilai fungsi optimalitas Si = sum(v_ij)
     */
    private function hitungNilaiOptimalitas(array $weightedMatrix)
    {
        // Si untuk A0 (baris pertama)
        $this->s0 = round(array_sum($weightedMatrix[0]), 3);

        // Si untuk setiap alternatif
        foreach ($this->siswaList as $idx => $siswa) {
            $row = $weightedMatrix[$idx + 1]; // +1 karena baris 0 adalah A0
            $siswa->si = round(array_sum($row), 3);

            // Simpan detail per kriteria untuk tampilan
            foreach ($this->criteriaColumns as $j => $col) {
                $siswa->{"weighted_$col"} = $weightedMatrix[$idx + 1][$j];
            }
        }
    }

    /**
     * Langkah 5: Hitung derajat utilitas Ki = Si / S0
     */
    private function hitungDerajatUtilitas()
    {
        foreach ($this->siswaList as $siswa) {
            $siswa->skor = $this->s0 > 0 ? round($siswa->si / $this->s0, 3) : 0;
        }
    }

    /**
     * Get bobot ROC
     */
    public function getWeights(): array
    {
        return $this->weights;
    }

    /**
     * Get S0 (nilai optimal)
     */
    public function getS0(): float
    {
        return $this->s0 ?? 0;
    }
}
