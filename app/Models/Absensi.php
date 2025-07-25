<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'karyawan_id',
        'tanggal',
        'status_absensi',
        'keterangan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'karyawan_id');
    }
}
