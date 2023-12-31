<?php

namespace App\Filament\Resources\OrderrResource\Pages;

use App\Filament\Resources\OrderrResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrderrs extends ListRecords
{
    protected static string $resource = OrderrResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
