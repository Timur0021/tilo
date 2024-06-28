<?php

namespace App\Filament\Resources\ServiceCategory\ServiceCategoryResource\Pages;

use App\Filament\Resources\ServiceCategory\ServiceCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateServiceCategory extends CreateRecord
{
    protected static string $resource = ServiceCategoryResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function afterCreate(): void
    {
        $this->redirect($this->getRedirectUrl());
    }
}
