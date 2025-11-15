<?php

namespace App\Filament\Admin\Resources\Professors\Pages;

use App\Filament\Admin\Resources\Professors\ProfessorResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProfessors extends ListRecords
{
    protected static string $resource = ProfessorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
