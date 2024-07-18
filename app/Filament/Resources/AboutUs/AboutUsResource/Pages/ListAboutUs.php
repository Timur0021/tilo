<?php

namespace App\Filament\Resources\AboutUs\AboutUsResource\Pages;

use App\Filament\Resources\AboutUs\AboutUsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAboutUs extends ListRecords
{
    protected static string $resource = AboutUsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
