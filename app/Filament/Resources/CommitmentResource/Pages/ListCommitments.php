<?php

namespace App\Filament\Resources\CommitmentResource\Pages;

use App\Filament\Resources\CommitmentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCommitments extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = CommitmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
