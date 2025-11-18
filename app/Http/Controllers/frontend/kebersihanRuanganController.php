<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kesekretariatan\Ruangan;
use App\Models\Kesekretariatan\KebersihanRuangan;

class kebersihanRuanganController extends Controller
{
    public function scan($ruangan_id)
    {
        $ruangan = Ruangan::with('petugas')->findOrFail($ruangan_id);
        $tanggalHariIni = now()->toDateString();

        $checklist = KebersihanRuangan::firstOrCreate(
            [
                'ruangan_id' => $ruangan_id,
                'tanggal_check' => $tanggalHariIni,
            ],
            [
                'uraian_kegiatan' => 'Checklist harian otomatis',
            ]
        );

        if ($checklist->is_completed) {
            return response('<h2 class="text-center text-green-600">✅ Bukti sudah dikirim hari ini!</h2>', 200);
        }

        return view('frontend.kebersihanRuangan.index', compact('checklist', 'ruangan'));
    }

    public function submit(Request $request, $ruangan_id)
    {
        $tanggalHariIni = now()->toDateString();

        $checklist = KebersihanRuangan::where('ruangan_id', $ruangan_id)
            ->where('tanggal_check', $tanggalHariIni)
            ->firstOrFail();

        $request->validate([
            'foto_bukti' => 'required|image|mimes:jpeg,png,jpg|max:1024',
        ]);

        $path = $request->file('foto_bukti')->store('kebersihan-bukti', 'public');

        $checklist->update([
            'foto_bukti' => $path,
            'is_completed' => true,
        ]);

        return redirect()->back()->with('success', '✅ Bukti kebersihan berhasil dikirim!');
    }
}
