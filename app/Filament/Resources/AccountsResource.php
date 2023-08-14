<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AccountsResource\Pages;
use App\Filament\Resources\AccountsResource\RelationManagers;
use App\Models\Accounts;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Symfony\Component\Console\Input\Input;

class AccountsResource extends Resource
{
    protected static ?string $model = Accounts::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Select::make("customer_id")
                        ->relationship("customer", "fullname")
                        ->searchable()
                        ->required(),
                    TextInput::make("account_number"),
                    TextInput::make("account_name"),
                    Select::make("account_type")->options(["01" => "Business Account", "02" => "EZ Account"]),

                    Select::make("currency")
                        ->multiple()
                        ->options([
                            "usd" => "USD",
                            "bth" => "Bath", "khr" => "KHR"
                        ])

                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAccounts::route('/'),
            'create' => Pages\CreateAccounts::route('/create'),
            'edit' => Pages\EditAccounts::route('/{record}/edit'),
        ];
    }
}
