<?php

namespace App\Filament\Resources\Kesekretariatan\PenilaianPegawais;

use App\Filament\Resources\Kesekretariatan\PenilaianPegawais\Pages\CreatePenilaianPegawai;
use App\Filament\Resources\Kesekretariatan\PenilaianPegawais\Pages\EditPenilaianPegawai;
use App\Filament\Resources\Kesekretariatan\PenilaianPegawais\Pages\ListPenilaianPegawais;
use App\Filament\Resources\Kesekretariatan\PenilaianPegawais\Schemas\PenilaianPegawaiForm;
use App\Filament\Resources\Kesekretariatan\PenilaianPegawais\Tables\PenilaianPegawaisTable;
use App\Models\Kesekretariatan\PenilaianPegawai;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class PenilaianPegawaiResource extends Resource
{
    protected static string | UnitEnum | null $navigationGroup = 'Kesekretariatan';

    protected static ?string $navigationLabel = 'Penilaian Pegawai';

    protected static ?int $navigationSort = 4;

    protected static ?string $model = PenilaianPegawai::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::AcademicCap;

    protected static ?string $recordTitleAttribute = 'Kesekretariatan/PenilaianPegawai';

    public static function form(Schema $schema): Schema
    {
        return PenilaianPegawaiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PenilaianPegawaisTable::configure($table);
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
            'index' => ListPenilaianPegawais::route('/'),
            // 'create' => CreatePenilaianPegawai::route('/create'),
            'edit' => EditPenilaianPegawai::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
