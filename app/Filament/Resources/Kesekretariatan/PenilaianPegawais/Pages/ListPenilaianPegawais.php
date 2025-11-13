<?php

namespace App\Filament\Resources\Kesekretariatan\PenilaianPegawais\Pages;

use App\Filament\Resources\Kesekretariatan\PenilaianPegawais\PenilaianPegawaiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\Kesekretariatan\PenilaianPegawais\Widgets\PenilaianPegawaiWidget;

class ListPenilaianPegawais extends ListRecords
{
    protected static string $resource = PenilaianPegawaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // CreateAction::make(),   
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            PenilaianPegawaiWidget::class,
        ];
    }

    public function getTableEmptyStateHeading(): ?string
    {
        return 'Tidak ada penilaian untuk periode ini.';
    }

    public function getTableEmptyStateDescription(): ?string
    {
        return 'Anda belum memiliki penilaian pegawai yang diberikan untuk periode ini.';
    }
}
