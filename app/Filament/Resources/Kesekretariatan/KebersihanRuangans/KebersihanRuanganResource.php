<?php

namespace App\Filament\Resources\Kesekretariatan\KebersihanRuangans;

use App\Filament\Resources\Kesekretariatan\KebersihanRuangans\Pages\CreateKebersihanRuangan;
use App\Filament\Resources\Kesekretariatan\KebersihanRuangans\Pages\EditKebersihanRuangan;
use App\Filament\Resources\Kesekretariatan\KebersihanRuangans\Pages\ListKebersihanRuangans;
use App\Filament\Resources\Kesekretariatan\KebersihanRuangans\Schemas\KebersihanRuanganForm;
use App\Filament\Resources\Kesekretariatan\KebersihanRuangans\Tables\KebersihanRuangansTable;
use App\Models\Kesekretariatan\KebersihanRuangan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class KebersihanRuanganResource extends Resource
{
    protected static ?string $model = KebersihanRuangan::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static string| \UnitEnum | null $navigationGroup = 'Kesekretariatan';
    protected static ?int $navigationSort = 2;
    protected static ?string $label = 'Kebersihan Ruangan';
    protected static ?string $pluralLabel = 'Kebersihan Ruangan';
    protected static ?string $recordTitleAttribute = 'KebersihanRuangan';

    public static function form(Schema $schema): Schema
    {
        return KebersihanRuanganForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KebersihanRuangansTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListKebersihanRuangans::route('/'),
            'create' => CreateKebersihanRuangan::route('/create'),
            'edit' => EditKebersihanRuangan::route('/{record}/edit'),
        ];
    }
}
