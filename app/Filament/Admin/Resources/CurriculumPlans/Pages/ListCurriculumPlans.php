<?php

namespace App\Filament\Admin\Resources\CurriculumPlans\Pages;

use App\Filament\Admin\Resources\CurriculumPlans\CurriculumPlanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCurriculumPlans extends ListRecords
{
    protected static string $resource = CurriculumPlanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
