<?php

namespace App\Filament\Resources\PromotionProductResource\Pages;

use App\Filament\Resources\PromotionProductResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPromotionProducts extends ListRecords
{
    protected static string $resource = PromotionProductResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
