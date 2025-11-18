<?php

namespace App\Filament\Resources\Kesekretariatan\KebersihanRuangans\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DateTimePicker;
use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\ImageEntry;
use Filament\Forms\Components\Textarea;

class KebersihanRuanganForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Kebersihan Ruangan')
                    ->schema([
                        Select::make('uangan_id')
                            ->label('Ruangan')
                            ->relationship('ruangan', 'nama_ruangan')
                            ->disabled(),
                        
                        DateTimePicker::make('tanggal_check')
                            ->label('Tanggal Checklist')
                            ->default(now()->toDateString())
                            ->disabled(),
                        
                            // paraf_pengawas
                        Select::make('paraf_pengawas')
                            ->label('Validasi Pengawas')
                            // default value
                            ->default(0)
                            ->options([
                                0 => '❌ Belum Paraf',
                                1 => '✅ Sudah Paraf',
                            ]),
                        // hasil perkerjaan
                        Select::make('hasil_pekerjaan')
                            ->label('Hasil Pekerjaan')
                            ->options([
                                'kurang' => 'kurang Bersih',
                                'cukup' => 'Cukup Bersih',
                                'baik' => 'Baik/Bersih',
                            ])
                            ->columns(2),
                        // waktu_validasi pengawas otomatis ketika save
                        DateTimePicker::make('waktu_validasi')
                            ->label('Waktu Validasi Pengawas')
                            ->default(now())
                            ->disabled(),
                    ])
                    ->columns(1),
                Section::make('Detail Foto')
                    ->schema([
                        ImageEntry::make('foto_bukti')
                            ->label('Foto Bukti Kebersihan/Evidence')
                            ->disk('public')

                    ])
                    ->columns(1),
            ]);
    }
}
