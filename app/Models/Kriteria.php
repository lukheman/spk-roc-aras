<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kriteria extends Model
{
    use HasFactory;

    protected $table = 'kriteria';
    protected $primaryKey = 'id_kriteria';
    protected $guarded = [];

    public function nilaiAlternatif(): HasMany
    {
        return $this->hasMany(NilaiAlternatif::class, 'id_kriteria', 'id_kriteria');
    }

    public function subKriteria(): HasMany
    {
        return $this->hasMany(SubKriteria::class, 'id_kriteria', 'id_kriteria');
    }
}
