<?php

namespace App\Filament\Resources\AvocadoResource\Pages;

use App\Filament\Resources\AvocadoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAvocados extends ListRecords
{
    protected static string $resource = AvocadoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
