<?php

namespace App\Filament\Resources\AboutUs\AboutUsResource\Pages;

use App\Filament\Resources\AboutUs\AboutUsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAboutUs extends CreateRecord
{
    protected static string $resource = AboutUsResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function afterCreate(): void
    {
        $this->redirect($this->getRedirectUrl());
    }
}
