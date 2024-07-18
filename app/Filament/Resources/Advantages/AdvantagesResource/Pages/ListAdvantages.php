<?php

namespace App\Filament\Resources\Advantages\AdvantagesResource\Pages;

use App\Filament\Resources\Advantages\AdvantagesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAdvantages extends ListRecords
{
    protected static string $resource = AdvantagesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
