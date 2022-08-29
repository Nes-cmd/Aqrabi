<?php

namespace App\Filament\Resources\CuponResource\Pages;

use App\Filament\Resources\CuponResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCupon extends EditRecord
{
    protected static string $resource = CuponResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
