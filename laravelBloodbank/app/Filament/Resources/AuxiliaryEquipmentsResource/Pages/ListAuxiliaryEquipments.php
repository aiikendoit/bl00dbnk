<?php

namespace App\Filament\Resources\AuxiliaryEquipmentsResource\Pages;

use App\Filament\Resources\AuxiliaryEquipmentsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAuxiliaryEquipments extends ListRecords
{
    protected static string $resource = AuxiliaryEquipmentsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
