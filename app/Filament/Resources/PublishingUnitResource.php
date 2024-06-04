<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PublishingUnitResource\Pages;
use App\Filament\Resources\PublishingUnitResource\RelationManagers;
use App\Models\PublishingUnit;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PublishingUnitResource extends Resource
{
    protected static ?string $model = PublishingUnit::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static ?string $modelLabel = 'Unit Penerbit';
    protected static ?string $pluralModelLabel = 'Unit Penerbit';
    protected static ?string $navigationGroup = 'Kelola Entitas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama Unit Penerbit')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ManagePublishingUnits::route('/'),
        ];
    }
}
