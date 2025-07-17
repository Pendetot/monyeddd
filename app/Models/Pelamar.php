<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelamar extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'telepon',
        'alamat',
        'status_aplikasi',
        'tanggal_interview',
        'catatan_hrd',
    ];

    protected $casts = [
        'tanggal_interview' => 'date',
    ];
}
