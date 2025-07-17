<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'karyawan_id',
        'jabatan_lama',
        'jabatan_baru',
        'alasan',
        'tanggal_mutasi',
    ];

    protected $casts = [
        'tanggal_mutasi' => 'date',
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
