<?php

namespace App\Filament\Resources\Kesekretariatan\Ruangans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class RuangansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode_ruangan')
                    ->label('Kode Ruangan'),
                TextColumn::make('nama_ruangan')
                    ->label('Nama Ruangan'),
                TextColumn::make('petugas.name')
                    ->label('Nama Petugas'),
                TextColumn::make('petugas.phone_number')
                    ->label('Nomor Telepon Petugas'),
                ImageColumn::make('qr_code')
                    ->label('QR Code')
                    ->view('filament.custom.tables.columns.qr-ruangan'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
