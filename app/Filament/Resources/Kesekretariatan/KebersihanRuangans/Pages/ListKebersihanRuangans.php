<?php

namespace App\Filament\Resources\Kesekretariatan\KebersihanRuangans\Pages;

use App\Filament\Resources\Kesekretariatan\KebersihanRuangans\KebersihanRuanganResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\Kesekretariatan\KebersihanRuangans\Widgets\ChecklistWidget;

class ListKebersihanRuangans extends ListRecords
{
    protected static string $resource = KebersihanRuanganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            ChecklistWidget::class,
        ];
    }
}
