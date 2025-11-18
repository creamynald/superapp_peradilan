<?php

namespace App\Filament\Resources\Kesekretariatan\KebersihanRuangans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class KebersihanRuangansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tanggal_check')->label('Tanggal Check')->date(),
                TextColumn::make('ruangan.nama_ruangan')->label('Ruangan')->searchable(),
                TextColumn::make('is_completed')
                    ->label('Status')
                    ->formatStateUsing(fn ($state) => $state ? '✅ Sudah dibersihkan' : '❌ Belum dibersihkan')
                    ->color(fn ($state) => $state ? 'success' : 'danger'),
                TextColumn::make('paraf_pengawas')->label('Validasi pengawas')
                    ->formatStateUsing(fn ($state) => $state ? '✅ Sudah Paraf' : '❌ Belum Paraf')
                    ->color(fn ($state) => $state ? 'success' : 'danger'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()
                    ->label('Validasi')
                    ->mutateFormDataUsing(function (array $data): array {
                        $data['paraf_pengawas'] = true;
                        return $data;
                    }),
            ])
            ->toolbarActions([
                // BulkActionGroup::make([
                //     DeleteBulkAction::make(),
                // ]),
            ]);
    }
}
