<?php

namespace App\Models\Kesekretariatan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Kesekretariatan\KebersihanRuangan;
use App\Models\User;
use Illuminate\Support\Str;

class Ruangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_ruangan',
        'nama_ruangan',
        'petugas_id',
        'qr_code',
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            if (!$model->qr_code) {
                $model->qr_code = Str::uuid();
            }
        });
    }

    public function kebersihanRuangans()
    {
        return $this->hasMany(KebersihanRuangan::class, 'ruangan_id');
    }

    public function petugas()
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }
}
