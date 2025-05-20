<?php

namespace App\Filament\Resources\GambarLandingResource\Pages;

use App\Filament\Resources\GambarLandingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGambarLandings extends ListRecords
{
    protected static string $resource = GambarLandingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
