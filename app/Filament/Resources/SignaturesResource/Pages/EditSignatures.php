<?php

namespace App\Filament\Resources\SignaturesResource\Pages;

use App\Filament\Resources\SignaturesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSignatures extends EditRecord
{
    protected static string $resource = SignaturesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
