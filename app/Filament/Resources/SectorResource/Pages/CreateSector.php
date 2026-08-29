<?php

namespace App\Filament\Resources\SectorResource\Pages;

use App\Filament\Resources\SectorResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSector extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = SectorResource::class;
}
