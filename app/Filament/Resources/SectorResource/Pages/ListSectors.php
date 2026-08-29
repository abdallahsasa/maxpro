<?php

namespace App\Filament\Resources\SectorResource\Pages;

use App\Filament\Resources\SectorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSectors extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = SectorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
