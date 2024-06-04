<?php

namespace App\Filament\Resources\OutcomingLetterResource\Pages;

use App\Filament\Exports\OutcomingLetterExporter;
use App\Filament\Resources\OutcomingLetterResource;
use Filament\Actions;
use Filament\Actions\ExportAction;
use Filament\Resources\Pages\ManageRecords;

class ManageOutcomingLetters extends ManageRecords
{
    protected static string $resource = OutcomingLetterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->icon('heroicon-o-plus')->label('Tambah Data'),
            ExportAction::make()->exporter(OutcomingLetterExporter::class)->label('Cetak Data')->modelLabel('Surat Keluar')
        ];
    }
}
