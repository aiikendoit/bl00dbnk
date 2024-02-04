<?php

namespace App\Filament\Resources\AuxiliaryEquipmentsResource\Pages;

use App\Filament\Resources\AuxiliaryEquipmentsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAuxiliaryEquipments extends EditRecord
{
    protected static string $resource = AuxiliaryEquipmentsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
