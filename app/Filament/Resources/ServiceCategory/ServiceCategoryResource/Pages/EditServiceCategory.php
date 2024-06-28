<?php

namespace App\Filament\Resources\ServiceCategory\ServiceCategoryResource\Pages;

use App\Filament\Resources\ServiceCategory\ServiceCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditServiceCategory extends EditRecord
{
    protected static string $resource = ServiceCategoryResource::class;

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
