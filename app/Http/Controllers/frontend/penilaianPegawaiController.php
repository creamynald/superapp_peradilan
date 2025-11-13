<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kesekretariatan\PenilaianPegawai;
use App\Models\kesekretariatan\Pegawai;

class penilaianPegawaiController extends Controller
{
    public function showForm()
    {
        $pegawaiList = Pegawai::orderBy('nip')->get();
        return view('frontend.pernilaianPegawai.form', compact('pegawaiList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'isi_penilaian' => 'required|string',
            'periode_penilaian' => 'required|string|max:20',
        ]);

        PenilaianPegawai::create([
            'employee_id' => $request->employee_id,
            'isi_penilaian' => $request->isi_penilaian,
            'periode_penilaian' => $request->periode_penilaian,
        ]);

        return redirect()->back()->with('success', 'Terima kasih atas penilaian Anda.');
    }
}
