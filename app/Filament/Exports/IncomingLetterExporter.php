<?php

namespace App\Filament\Exports;

use App\Models\IncomingLetter;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class IncomingLetterExporter extends Exporter
{
    protected static ?string $model = IncomingLetter::class;

    public function getFileName(Export $export): string
    {
        return "surat-masuk-{$export->getKey()}";
    }

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('letter_number')->label('No. Surat'),
            ExportColumn::make('sender')->label('Nama Pengirim'),
            ExportColumn::make('letter_date')->label('Tanggal'),
            ExportColumn::make('attachments')->label('Lampiran'),
            ExportColumn::make('subject')->label('Perihal'),
            ExportColumn::make('recipient')->label('Nama Penerima'),
            ExportColumn::make('content')->label('Isi Surat'),
            ExportColumn::make('publishing_unit_id')->label('Unit Penerbit'),
            ExportColumn::make('letter_location')->label('Tempat Surat'),
            ExportColumn::make('signer_id')->label('Pengesah'),
            ExportColumn::make('cc')->label('Tembusan'),
            ExportColumn::make('created_at')->label('Dibuat pada'),
            ExportColumn::make('updated_at')->label('Diperbarui pada'),
            ExportColumn::make('file')->label('Scan'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Dokumen surat masuk anda telah selesai diproses, ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' berkas yang telah ditangani.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' gagal diekspor.';
        }

        return $body;
    }
}
