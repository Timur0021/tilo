<?php

namespace App\Filament\Resources\VandorCategory\VendorCategoryResource\Pages;

use App\Filament\Resources\VandorCategory\VendorCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateVendorCategory extends CreateRecord
{
    protected static string $resource = VendorCategoryResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function afterCreate(): void
    {
        $this->redirect($this->getRedirectUrl());
    }
}
