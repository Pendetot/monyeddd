<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logistik extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'role' => \App\Enums\RoleEnum::class,
    ];

    public function pengajuanBarangs()
    {
        return $this->hasMany(PengajuanBarang::class, 'logistic_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('logistik', function ($builder) {
            $builder->where('role', \App\Enums\RoleEnum::Logistik);
        });
    }
}