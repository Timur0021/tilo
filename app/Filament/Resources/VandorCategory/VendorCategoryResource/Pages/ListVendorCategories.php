<?php

namespace App\Filament\Resources\VandorCategory\VendorCategoryResource\Pages;

use App\Filament\Resources\VandorCategory\VendorCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVendorCategories extends ListRecords
{
    protected static string $resource = VendorCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
