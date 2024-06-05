<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OutcomingLetterResource\Pages;
use App\Filament\Resources\OutcomingLetterResource\RelationManagers;
use App\Models\OutcomingLetter;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OutcomingLetterResource extends Resource
{
    protected static ?string $model = OutcomingLetter::class;

    protected static ?string $navigationIcon = 'heroicon-o-paper-airplane';
    protected static ?string $modelLabel = 'Surat Keluar';
    protected static ?string $pluralModelLabel = 'Surat Keluar';
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
                Forms\Components\RichEditor::make('content')->label('Isi surat')->required(),
                Forms\Components\Select::make('publishing_unit_id')->label('Unit penerbit')->relationship('publishingUnit', 'name')->required(),
                Forms\Components\TextInput::make('letter_location')->label('Tempat')->required(),
                Forms\Components\Select::make('signer_id')->label('Pengesah')->relationship('signer', 'name')->required(),
                Forms\Components\TextInput::make('cc')->label('Tembusan')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('letter_number')
                    ->label('No. Surat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('recipient')
                    ->label('Penerima')
                    ->searchable(),
                Tables\Columns\TextColumn::make('letter_date')
                    ->label('Tanggal')
                    ->searchable(),
                Tables\Columns\TextColumn::make('letter_location')
                    ->label('Tempat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('subject')
                    ->label('Perihal')
                    ->searchable(),
                Tables\Columns\TextColumn::make('signer.name')
                    ->label('Pengesah')
                    ->numeric(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Action::make('download')
                    ->label('Cetak')
                    ->icon('heroicon-o-printer')
                    ->url(fn (OutcomingLetter $record) => route('pdf.outcoming-letter', $record->id), true),
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
            'index' => Pages\ManageOutcomingLetters::route('/'),
        ];
    }
}
