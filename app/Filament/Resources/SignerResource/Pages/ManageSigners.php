<?php

namespace App\Filament\Resources\SignerResource\Pages;

use App\Filament\Resources\SignerResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageSigners extends ManageRecords
{
    protected static string $resource = SignerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->icon('heroicon-o-plus')->label('Tambah Data'),
        ];
    }
}
