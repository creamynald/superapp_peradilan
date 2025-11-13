<?php

namespace App\Filament\Resources\Kesekretariatan\PenilaianPegawais\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Text;
use Filament\Forms\Components\ToggleButtons;
use Filament\Support\Enums\Width;
use Filament\Tables\Table;

class PenilaianPegawaiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make()
                    ->schema([
                        Section::make('Rincian Penilaian')
                            ->columnSpan(2)
                            ->schema([
                                TextEntry::make('isi_penilaian')
                                    ->extraAttributes(['class' => 'max-h-96 overflow-y-auto'])
                                    ->columnSpanFull(), // Isi penuh lebar section
                            ]),
                        Section::make('Rincian Waktu')
                            ->columnSpan(1)
                            ->schema([
                                TextEntry::make('created_at')
                                    ->dateTime()
                                    ->label('Diinput Pada'),
                                TextEntry::make('periode_penilaian')
                                    ->dateTime('Y')
                                    ->label('Periode'),
                                TextEntry::make('is_read')
                                    ->label('Status')
                                    ->formatStateUsing(fn (bool $state): string => $state ? 'Sudah Dibaca' : 'Belum Dibaca'),
                            ]),
                    ])
                    ->columns(3)
                    ->columnSpanFull(),
            ]);
    }
}
