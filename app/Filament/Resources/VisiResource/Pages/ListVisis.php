<?php

namespace App\Filament\Resources\VisiResource\Pages;

use App\Filament\Resources\VisiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVisis extends ListRecords
{
    protected static string $resource = VisiResource::class;

    public function mount(): void
    {
        $firstVisi = static::$resource::getModel()::query()->first();
        if ($firstVisi) {
            $this->redirect(static::$resource::getUrl('view', ['record' => $firstVisi]));
        }else {
            $this->redirect(static::$resource::getUrl('create'));
        }

     
    
    }



    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
