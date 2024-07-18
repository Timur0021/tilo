<?php

namespace App\Filament\Resources\Advantages\AdvantagesResource\Pages;

use App\Filament\Resources\Advantages\AdvantagesResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAdvantages extends CreateRecord
{
    protected static string $resource = AdvantagesResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function afterCreate(): void
    {
        $this->redirect($this->getRedirectUrl());
    }
}
