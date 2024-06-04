<?php

namespace App\Filament\Resources\IncomingLetterResource\Pages;

use App\Filament\Exports\IncomingLetterExporter;
use App\Filament\Resources\IncomingLetterResource;
use Filament\Actions;
use Filament\Actions\ExportAction;
use Filament\Resources\Pages\ManageRecords;

class ManageIncomingLetters extends ManageRecords
{
    protected static string $resource = IncomingLetterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Tambah Data')->icon('heroicon-o-plus'),
            ExportAction::make()->exporter(IncomingLetterExporter::class)->label('Cetak Data')->modelLabel('Surat Masuk')
        ];
    }
}
