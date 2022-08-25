<?php

namespace App\Filament\Resources\SliderResource\Pages;

use App\Filament\Resources\SliderResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSliders extends ListRecords
{
    protected static string $resource = SliderResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
