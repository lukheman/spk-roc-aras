<?php
namespace App\Helpers;

use App\Models\Kriteria;
use App\Models\NilaiAlternatif;
use App\Models\Siswa;

class SpkAras
{

    public $siswaList;
    public $weights = [];
    public $criteriaTypes = [];
    public $criteriaList = [];
    public $s0 = 0;

    public function __construct()
    {
        // Ambil kriteria dari database, diurutkan berdasarkan kode
        $this->criteriaList = Kriteria::orderBy('prioritas')->get();

        // Ambil siswa yang memiliki nilai alternatif
        $this->siswaList = Siswa::query()->has('nilaiAlternatif')->with('nilaiAlternatif')->get();

        // Tipe kriteria dari database
        $this->criteriaTypes = $this->criteriaList->pluck('tipe')->toArray();

        // Hitung bobot menggunakan metode ROC (Rank Order Centroid)
        $this->hitungBobotROC();
    }

    public $matrixDecision = [];
    public $optimalValues = [];
    public $matrixNormalized = [];
    public $matrixWeighted = [];

    public function ranking()
    {
        if ($this->criteriaList->isEmpty() || $this->siswaList->isEmpty()) {
            return $this->siswaList;
        }

        // Langkah 1: Bentuk matriks keputusan & tentukan nilai optimal (A0)
        $this->matrixDecision = $this->bentukMatriks();
        $this->optimalValues = $this->tentukanNilaiOptimal($this->matrixDecision);

        // Langkah 2: Normalisasi matriks
        $this->matrixNormalized = $this->normalisasiMatriks($this->matrixDecision, $this->optimalValues);

        // Langkah 3: Hitung matriks normalisasi terbobot
        $this->matrixWeighted = $this->hitungMatriksTerbobot($this->matrixNormalized);

        // Langkah 4: Hitung nilai fungsi optimalitas (Si)
        $this->hitungNilaiOptimalitas($this->matrixWeighted);

        // Langkah 5: Hitung derajat utilitas (Ki)
        $this->hitungDerajatUtilitas();

        return $this->siswaList;
    }

    /**
     * Hitung bobot ROC (Rank Order Centroid) untuk n kriteria
     */
    private function hitungBobotROC()
    {
        $n = count($this->criteriaList);

        if ($n === 0) {
            return;
        }

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
            foreach ($this->criteriaList as $kriteria) {
                // Cari nilai alternatif siswa untuk kriteria ini
                $nilaiAlternatif = $siswa->nilaiAlternatif
                    ->where('id_kriteria', $kriteria->id_kriteria)
                    ->first();
                $row[] = (float) ($nilaiAlternatif?->nilai ?? 0);
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
        $criteriaCount = count($this->criteriaList);

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
        $criteriaCount = count($this->criteriaList);

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
            foreach ($this->criteriaList as $j => $kriteria) {
                $siswa->{"weighted_{$kriteria->kode}"} = $weightedMatrix[$idx + 1][$j];
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

    /**
     * Get daftar kriteria
     */
    public function getCriteriaList()
    {
        return $this->criteriaList;
    }
}
