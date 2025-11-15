<?php

namespace App\Filament\Admin\Resources\Professors\Pages;

use App\Filament\Admin\Resources\Professors\ProfessorResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditProfessor extends EditRecord
{
    protected static string $resource = ProfessorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
