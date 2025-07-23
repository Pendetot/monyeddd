<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekeningKaryawan extends Model
{
    use HasFactory;

    protected $fillable = [
        'karyawan_id',
        'nama_bank',
        'nomor_rekening',
        'nama_pemilik',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'karyawan_id');
    }
}
