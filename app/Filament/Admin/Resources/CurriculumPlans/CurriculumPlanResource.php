<?php

namespace App\Filament\Admin\Resources\CurriculumPlans;

use App\Filament\Admin\Resources\CurriculumPlans\Pages\CreateCurriculumPlan;
use App\Filament\Admin\Resources\CurriculumPlans\Pages\EditCurriculumPlan;
use App\Filament\Admin\Resources\CurriculumPlans\Pages\ListCurriculumPlans;
use App\Filament\Admin\Resources\CurriculumPlans\Schemas\CurriculumPlanForm;
use App\Filament\Admin\Resources\CurriculumPlans\Tables\CurriculumPlansTable;
use App\Models\CurriculumPlan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CurriculumPlanResource extends Resource
{
    protected static ?string $model = CurriculumPlan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return CurriculumPlanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CurriculumPlansTable::configure($table);
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
            'index' => ListCurriculumPlans::route('/'),
            'create' => CreateCurriculumPlan::route('/create'),
            'edit' => EditCurriculumPlan::route('/{record}/edit'),
        ];
    }
}
