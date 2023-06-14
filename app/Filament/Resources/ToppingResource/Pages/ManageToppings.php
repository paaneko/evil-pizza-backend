<?php

namespace App\Filament\Resources\ToppingResource\Pages;

use App\Filament\Resources\ToppingResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageToppings extends ManageRecords
{
    protected static string $resource = ToppingResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
