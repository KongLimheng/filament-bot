<?php

namespace App\Filament\Resources\SignaturesResource\Pages;

use App\Filament\Resources\SignaturesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSignatures extends ListRecords
{
    protected static string $resource = SignaturesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
