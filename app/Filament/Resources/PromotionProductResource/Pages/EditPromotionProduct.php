<?php

namespace App\Filament\Resources\PromotionProductResource\Pages;

use App\Filament\Resources\PromotionProductResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPromotionProduct extends EditRecord
{
    protected static string $resource = PromotionProductResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
