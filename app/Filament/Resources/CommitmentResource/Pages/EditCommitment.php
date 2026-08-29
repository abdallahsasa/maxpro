<?php

namespace App\Filament\Resources\CommitmentResource\Pages;

use App\Filament\Resources\CommitmentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCommitment extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = CommitmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
