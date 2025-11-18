<?php

namespace App\Models\Kesekretariatan;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Kesekretariatan\Ruangan;

class KebersihanRuangan extends Model
{
    protected $fillable = [
        'ruangan_id',
        'tanggal_check',
        'foto_bukti',
        'is_completed',
        'paraf_pengawas',
        'hasil_pekerjaan',
        'waktu_validasi',
        'pengawas_id',
    ];

    protected $casts = [
        'tanggal_check' => 'date',
        'waktu_validasi' => 'datetime',
        'is_completed' => 'boolean',
        'paraf_pengawas' => 'boolean',
    ];

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'ruangan_id');
    }

    public function petugas()
    {
        return $this->ruangan->petugas;
    }

    public function pengawas()
    {
        return $this->belongsTo(User::class, 'pengawas_id');
    }
}
