<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembinaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'karyawan_id',
        'tanggal_pembinaan',
        'catatan',
        'hasil',
    ];
}
