<?php

namespace App\Filament\Resources\Kesekretariatan\PenilaianPegawais\Pages;

use App\Filament\Resources\Kesekretariatan\PenilaianPegawais\PenilaianPegawaiResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions\Action;

class EditPenilaianPegawai extends ViewRecord
{
    protected static string $resource = PenilaianPegawaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
            Action::make('markAsRead')
                ->label('Tandai Sudah Dibaca')
                ->icon('heroicon-o-eye')
                ->button()
                ->color('success')
                ->action(function () {
                    $record = $this->getRecord();
                    $record->update(['is_read' => true]);
                })
                ->requiresConfirmation()
                ->visible(fn ($record) => !$record->is_read),
        ];
    }   
}
