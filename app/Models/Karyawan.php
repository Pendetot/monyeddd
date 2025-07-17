<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nik',
        'alamat',
        'telepon',
        'jabatan',
        'penempatan',
        'status',
    ];

    protected $casts = [
        'status' => \App\Enums\StatusKaryawanEnum::class,
    ];

    public function cutis()
    {
        return $this->hasMany(Cuti::class);
    }

    public function mutasis()
    {
        return $this->hasMany(Mutasi::class);
    }

    public function resigns()
    {
        return $this->hasMany(Resign::class);
    }

    public function hutangKaryawans()
    {
        return $this->hasMany(HutangKaryawan::class);
    }

    public function kpis()
    {
        return $this->hasMany(KPI::class);
    }
}
