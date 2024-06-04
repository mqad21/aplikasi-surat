<?php

namespace App\Filament\Resources;

use App\Filament\Exports\IncomingLetterExporter;
use App\Filament\Resources\IncomingLetterResource\Pages;
use App\Filament\Resources\IncomingLetterResource\RelationManagers;
use App\Models\IncomingLetter;
use Filament\Actions\Exports\Enums\ExportFormat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\HeaderActionsPosition;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class IncomingLetterResource extends Resource
{
    protected static ?string $model = IncomingLetter::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox-arrow-down';
    protected static ?string $modelLabel = 'Surat Masuk';
    protected static ?string $pluralModelLabel = 'Surat Masuk';
    protected static ?string $navigationGroup = 'Kelola Surat';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('letter_number')->label('Nomor surat')->required()->unique(ignoreRecord: true),
                Forms\Components\TextInput::make('sender')->label('Nama pengirim')->required(),
                Forms\Components\DatePicker::make('letter_date')->label('Tanggal')->required(),
                Forms\Components\TextInput::make('attachments')->label('Lampiran'),
                Forms\Components\TextInput::make('subject')->label('Perihal')->required(),
                Forms\Components\TextInput::make('recipient')->label('Nama penerima')->required(),
                Forms\Components\Textarea::make('content')->label('Isi surat')->required(),
                Forms\Components\Select::make('publishing_unit_id')->label('Unit penerbit')->relationship('publishingUnit', 'name')->required(),
                Forms\Components\TextInput::make('letter_location')->label('Tempat')->required(),
                Forms\Components\Select::make('signer_id')->label('Pengesah')->relationship('signer', 'name')->required(),
                Forms\Components\TextInput::make('cc')->label('Tembusan'),
                Forms\Components\FileUpload::make('file')
                    ->acceptedFileTypes(['application/pdf', 'image/*'])
                    ->label('File Scan'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('letter_number')->label('No. Surat')->searchable(),
                Tables\Columns\TextColumn::make('sender')->label('Pengirim')->searchable(),
                Tables\Columns\TextColumn::make('letter_date')->label('Tanggal')->searchable(),
                Tables\Columns\TextColumn::make('letter_location')->label('Tempat Surat')->searchable(),
                Tables\Columns\TextColumn::make('subject')->label('Perihal')->searchable(),
            ])
            ->filters([
                //
            ])
            ->defaultSort('letter_date', 'desc')
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
            'index' => Pages\ManageIncomingLetters::route('/'),
        ];
    }
}
