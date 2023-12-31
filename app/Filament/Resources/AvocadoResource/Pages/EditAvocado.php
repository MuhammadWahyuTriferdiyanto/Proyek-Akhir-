<?php

namespace App\Filament\Resources\AvocadoResource\Pages;

use App\Filament\Resources\AvocadoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAvocado extends EditRecord
{
    protected static string $resource = AvocadoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
