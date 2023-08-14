<?php

namespace App\Filament\Pages;

use App\Settings\FooterSettings;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;

class ManageFooter extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static string $settings = FooterSettings::class;

    protected function getFormSchema(): array
    {
        return [
            // TextInput::make('copyright')
            //     ->label('Copyright notice')
            //     ->required(),
            Repeater::make('links')
                ->schema([
                    TextInput::make('label')->required(),
                    // TextInput::make('url')
                    //     ->url()
                    //     ->required(),
                    Repeater::make("child-link")->schema([
                        TextInput::make("me"),
                        Select::make("l-select")->options(["a", "b", "c"])->multiple()
                    ])
                ]),
        ];
    }
}
