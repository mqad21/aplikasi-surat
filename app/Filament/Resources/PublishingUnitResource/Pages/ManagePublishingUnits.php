<?php

namespace App\Filament\Resources\PublishingUnitResource\Pages;

use App\Filament\Resources\PublishingUnitResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePublishingUnits extends ManageRecords
{
    protected static string $resource = PublishingUnitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->icon('heroicon-o-plus')->label('Tambah Data'),
        ];
    }
}
