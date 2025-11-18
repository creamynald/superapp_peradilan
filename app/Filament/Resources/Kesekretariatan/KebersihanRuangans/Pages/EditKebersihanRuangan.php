<?php

namespace App\Filament\Resources\Kesekretariatan\KebersihanRuangans\Pages;

use App\Filament\Resources\Kesekretariatan\KebersihanRuangans\KebersihanRuanganResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditKebersihanRuangan extends EditRecord
{
    protected static string $resource = KebersihanRuanganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
