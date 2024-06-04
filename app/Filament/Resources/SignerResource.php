<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SignerResource\Pages;
use App\Models\Signer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SignerResource extends Resource
{
    protected static ?string $model = Signer::class;
    protected static ?string $navigationIcon = 'heroicon-o-shield-check';
    protected static ?string $modelLabel = 'Pengesah';
    protected static ?string $pluralModelLabel = 'Pengesah';
    protected static ?string $navigationGroup = 'Kelola Entitas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->label('Nama Pengesah'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSigners::route('/'),
        ];
    }
}
