<?php

namespace App\Filament\Resources\AccountsResource\Pages;

use App\Filament\Resources\AccountsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAccounts extends EditRecord
{
    protected static string $resource = AccountsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
