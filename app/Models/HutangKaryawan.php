<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HutangKaryawan extends Model
{
    use HasFactory;

    protected $fillable = [
        'karyawan_id',
        'jumlah',
        'alasan',
        'status',
        'asal_hutang',
    ];

    protected $casts = [
        'status' => \App\Enums\StatusHutangEnum::class,
        'asal_hutang' => \App\Enums\AsalHutangEnum::class,
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
