<?php

namespace App\Filament\Resources\Kesekretariatan\Ruangans;

use App\Filament\Resources\Kesekretariatan\Ruangans\Pages\CreateRuangan;
use App\Filament\Resources\Kesekretariatan\Ruangans\Pages\EditRuangan;
use App\Filament\Resources\Kesekretariatan\Ruangans\Pages\ListRuangans;
use App\Filament\Resources\Kesekretariatan\Ruangans\Schemas\RuanganForm;
use App\Filament\Resources\Kesekretariatan\Ruangans\Tables\RuangansTable;
use App\Models\Kesekretariatan\Ruangan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class RuanganResource extends Resource
{
    protected static ?string $model = Ruangan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice2;
    protected static string| \UnitEnum | null $navigationGroup = 'Kesekretariatan';
    protected static ?string $navigationParentItem = 'Kebersihan Ruangan';
    protected static ?int $navigationSort = 1;
    protected static ?string $label = 'Ruangan';
    protected static ?string $pluralLabel = 'Ruangan';

    protected static ?string $recordTitleAttribute = 'Ruangan';

    public static function form(Schema $schema): Schema
    {
        return RuanganForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RuangansTable::configure($table);
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
            'index' => ListRuangans::route('/'),
            'create' => CreateRuangan::route('/create'),
            'edit' => EditRuangan::route('/{record}/edit'),
        ];
    }
}
