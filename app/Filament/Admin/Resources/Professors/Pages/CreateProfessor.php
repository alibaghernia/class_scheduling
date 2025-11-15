<?php

namespace App\Filament\Admin\Resources\Professors\Pages;

use App\Filament\Admin\Resources\Professors\ProfessorResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProfessor extends CreateRecord
{
    protected static string $resource = ProfessorResource::class;
}
