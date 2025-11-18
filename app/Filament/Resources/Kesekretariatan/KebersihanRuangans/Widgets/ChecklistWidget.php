<?php

namespace App\Filament\Resources\Kesekretariatan\KebersihanRuangans\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Kesekretariatan\Ruangan;

class ChecklistWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $tanggalHariIni = now()->toDateString();

        $ruangans = Ruangan::with(['kebersihanRuangans' => function ($query) use ($tanggalHariIni) {
            $query->where('tanggal_check', $tanggalHariIni);
        }])->get();
        
        return [
            Stat::make('Ruangans Checked Today', $ruangans->filter(function ($ruangan) {
                return $ruangan->kebersihanRuangans->isNotEmpty();
            })->count())
                ->description('Jumlah ruangan yang telah dicek hari ini')
                ->descriptionIcon('heroicon-o-check-circle')
                ->color('success'),

            Stat::make('Ruangans Not Checked Today', $ruangans->filter(function ($ruangan) {
                return $ruangan->kebersihanRuangans->isEmpty();
            })->count())
                ->description('Jumlah ruangan yang belum dicek hari ini')
                ->descriptionIcon('heroicon-o-exclamation-circle')
                ->color('danger'),
        ];
    }
}
