<?php

namespace App\Filament\Resources\GambarLandingResource\Pages;

use App\Filament\Resources\GambarLandingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGambarLanding extends EditRecord
{
    protected static string $resource = GambarLandingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
