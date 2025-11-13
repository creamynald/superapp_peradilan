<?php

namespace App\Filament\Resources\Kesekretariatan\PenilaianPegawais\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use App\Models\Kesekretariatan\Pegawai;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;

class PenilaianPegawaisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                $user = auth()->user();

                if (!$user->hasRole('super_admin')) {
                    $query->whereHas('pegawai.user', function ($q) use ($user) {
                        $q->where('id', $user->id);
                    });
                }
            })
            ->columns([
                TextColumn::make('isi_penilaian')
                    ->wrap()
                    ->limit(200)
                    ->searchable() 
                    ->description(fn ($record) => strlen($record->isi_penilaian) > 50 ? '...' : ''),
                TextColumn::make('pegawai.user.name')
                    ->label('Pejabat yang dinilai')
                    ->icon(Heroicon::User),
                IconColumn::make('is_read')
                    ->label('Status')
                    ->icon(fn (string $state): Heroicon => match ($state) {
                        '1' => Heroicon::Eye,
                        default => Heroicon::EyeSlash,
                    })
                    ->tooltip(fn (string $state): string => match ($state) {
                        '1' => 'Sudah Dibaca',
                        default => 'Belum Dibaca',
                    }),
            ])
            ->filters([
                // TrashedFilter::make(),
                SelectFilter::make('is_read')
                    ->label('Status')
                    ->options([
                        '1' => 'Sudah Dibaca',
                        '0' => 'Belum Dibaca',
                    ])
                    ->native(false),
            ])
            ->recordActions([
                // EditAction::make(),
            ])
            ->toolbarActions([
                // BulkActionGroup::make([
                //     DeleteBulkAction::make(),
                //     ForceDeleteBulkAction::make(),
                //     RestoreBulkAction::make(),
                // ]),
            ]);
    }
}
