<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KPI extends Model
{
    use HasFactory;

    protected $fillable = [
        'karyawan_id',
        'periode',
        'nilai_kpi',
        'evaluasi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'karyawan_id');
    }
}
