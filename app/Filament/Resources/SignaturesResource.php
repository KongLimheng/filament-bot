<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SignaturesResource\Pages;
use App\Filament\Resources\SignaturesResource\RelationManagers;
use App\Models\Signatures;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SignaturesResource extends Resource
{
    protected static ?string $model = Signatures::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Select::make("account_id")->label("Account")
                        ->searchable()
                        ->relationship("account", "account_number"),
                    TextInput::make("short_description"),
                    TextInput::make("gb_description"),
                    TextInput::make("image_type"),
                    TextInput::make("media_type")
                ])->columns(2),


                Section::make('Signatures')
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('media')
                            ->collection('signature-images')
                            ->multiple()
                            ->maxFiles(5)
                            ->disableLabel(),
                    ])
                    ->collapsible(),

                // Section::make('Photos')
                //     ->schema([
                //         SpatieMediaLibraryFileUpload::make('media')
                //             ->collection('photo-images')
                //             ->multiple()
                //             ->maxFiles(5)
                //             ->disableLabel(),
                //     ])
                //     ->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("account.account_name"),
                TextColumn::make("account.account_number"),
                SpatieMediaLibraryImageColumn::make('media')
                    ->label('Image')
                    ->collection('signature-image'),
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
            'index' => Pages\ListSignatures::route('/'),
            'create' => Pages\CreateSignatures::route('/create'),
            'edit' => Pages\EditSignatures::route('/{record}/edit'),
        ];
    }
}
