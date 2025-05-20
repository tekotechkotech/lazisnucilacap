<?php

namespace App\Filament\Resources\GambarLandingResource\Pages;

use App\Filament\Resources\GambarLandingResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewGambarLanding extends ViewRecord
{
    protected static string $resource = GambarLandingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
