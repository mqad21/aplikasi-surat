<?php

namespace App\Filament\Resources\IncomingLetterResource\Widgets;

use App\Models\IncomingLetter;
use App\Models\OutcomingLetter;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class Stats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Incoming Letter', IncomingLetter::count())->label('Surat Masuk'),
            Stat::make('Outcoming Letter', OutcomingLetter::count())->label('Surat Keluar'),
        ];
    }
}
