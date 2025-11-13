<?php

namespace App\Filament\Resources\Kesekretariatan\PenilaianPegawais\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Kesekretariatan\PenilaianPegawai;
use App\Models\Kesekretariatan\Pegawai;

class PenilaianPegawaiWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $thisYear = date('Y');
        $totalPenilaian = PenilaianPegawai::whereYear('created_at', $thisYear)->count();
        $getmyPenilaian = PenilaianPegawai::whereYear('created_at', $thisYear)
            ->where('employee_id', auth()->user()->id)
            ->count();
        $isRead = PenilaianPegawai::whereYear('created_at', $thisYear)
            ->where('employee_id', auth()->user()->id)
            ->where('is_read', true)
            ->count();
        $totalPegawai = Pegawai::count();
        
        return [
            Stat::make('Total Penilaian', $totalPenilaian)
                ->description('Total Penilaian Pejabat Periode ' . $thisYear)
                ->color('primary')
                ->descriptionIcon('heroicon-m-calendar'),
            Stat::make('Penilaian Saya', $getmyPenilaian)
                ->description('Tahun ' . $thisYear . ' | Dari ' . $totalPegawai . ' Pegawai')
                ->color('success')
                ->descriptionIcon('heroicon-m-calendar'),
            Stat::make('Sudah Dibaca', $isRead)
                ->description('Tahun ' . $thisYear . ' | Dari ' . $getmyPenilaian . ' Penilaian Saya')
                ->color('success')
                ->descriptionIcon('heroicon-m-calendar'),
        ];
    }
}
