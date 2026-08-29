<?php

namespace App\Filament\Resources\CommitmentResource\Pages;

use App\Filament\Resources\CommitmentResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCommitment extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = CommitmentResource::class;
}
