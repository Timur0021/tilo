<?php

namespace App\Filament\Resources\Advantages\AdvantagesResource\Pages;

use App\Filament\Resources\Advantages\AdvantagesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAdvantages extends EditRecord
{
    protected static string $resource = AdvantagesResource::class;

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
