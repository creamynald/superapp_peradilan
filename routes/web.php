<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\frontend\pegawaiController;
use App\Http\Controllers\frontend\penilaianPegawaiController;
use App\Http\Controllers\frontend\kebersihanRuanganController;

Route::get('/', function () {
    return view('maintenance');
});

Route::get('pegawai', [pegawaiController::class, 'index'])
    ->name('pegawai.index');

Route::get('/test-fonnte', function () {
    $response = Http::withHeaders([
            'Authorization' => env('FONNTE_TOKEN'),
        ])
        ->asMultipart()
        ->post('https://api.fonnte.com/send', [
            'target'      => '085263216699', // nomor tujuan
            'message'     => 'test message dari Laravel 12',
            'countryCode' => '62',
        ]);

    return [
        'ok'     => $response->successful(),
        'status' => $response->status(),
        'body'   => $response->body(),
        'json'   => $response->json(),
    ];
});

Route::get('/isi-penilaian', [penilaianPegawaiController::class, 'showForm'])->name('evaluasi.form');
Route::post('/isi-penilaian', [penilaianPegawaiController::class, 'store'])->name('evaluasi.store');

Route::get('/kebersihan/scan/{ruangan_id}', [kebersihanRuanganController::class, 'scan'])->name('kebersihan.scan');
Route::post('/kebersihan/submit/{ruangan_id}', [kebersihanRuanganController::class, 'submit'])->name('kebersihan.submit');