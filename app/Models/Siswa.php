<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    /** @use HasFactory<\Database\Factories\SiswaFactory> */
    use HasFactory;

    protected $table = 'siswa';
    protected $guarded = [];
    protected $primaryKey = 'id_siswa';

    public function nilaiAlternatif(): HasMany
    {
        return $this->hasMany(NilaiAlternatif::class, 'id_siswa', 'id_siswa');
    }
}
