<?php

namespace App\Filament\Resources\Kesekretariatan\Ruangans\Pages;

use App\Filament\Resources\Kesekretariatan\Ruangans\RuanganResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditRuangan extends EditRecord
{
    protected static string $resource = RuanganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
