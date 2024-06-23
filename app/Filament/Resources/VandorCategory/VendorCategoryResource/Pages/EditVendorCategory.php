<?php

namespace App\Filament\Resources\VandorCategory\VendorCategoryResource\Pages;

use App\Filament\Resources\VandorCategory\VendorCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVendorCategory extends EditRecord
{
    protected static string $resource = VendorCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function afterUpdate(): void
    {
        $this->redirect($this->getRedirectUrl());
    }
}
