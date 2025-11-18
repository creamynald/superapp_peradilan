<?php

namespace App\Filament\Resources\Kesekretariatan\Ruangans\Pages;

use App\Filament\Resources\Kesekretariatan\Ruangans\RuanganResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRuangans extends ListRecords
{
    protected static string $resource = RuanganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
