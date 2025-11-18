<?php

namespace App\Filament\Resources\Kesekretariatan\Ruangans\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class RuanganForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kode_ruangan')
                    ->label('Kode Ruangan')
                    ->required()
                    ->maxLength(50),
                TextInput::make('nama_ruangan')
                    ->label('Nama Ruangan')
                    ->required()
                    ->maxLength(255),
                Select::make('petugas_id')
                    ->label('Petugas')
                    ->relationship('petugas', 'name')
                    ->required(),
            ]);
    }
}
