<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPeringatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'karyawan_id',
        'jenis_sp',
        'tanggal_sp',
        'keterangan',
    ];

    protected $casts = [
        'tanggal_sp' => 'date',
        'jenis_sp' => \App\Enums\JenisSPEnum::class,
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
