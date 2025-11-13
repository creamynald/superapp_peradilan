<?php

namespace App\Models\Kesekretariatan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PenilaianPegawai extends Model
{
    use SoftDeletes;

    protected $table = 'penilaian_pegawais';

    protected $fillable = [
        'employee_id',
        'isi_penilaian',
        'periode_penilaian',
        'is_read',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'employee_id');
    }
}
