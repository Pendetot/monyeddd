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
        'asal_hutang',
        'status',
        'surat_peringatan_id',
    ];

    protected $casts = [
        'status' => \App\Enums\StatusHutangEnum::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'karyawan_id');
    }

    public function suratPeringatan()
    {
        return $this->belongsTo(SuratPeringatan::class);
    }
}
