<?php

namespace App\Filament\Resources\Tags\TagsResource\Pages;

use App\Filament\Resources\Tags\TagsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTags extends EditRecord
{
    protected static string $resource = TagsResource::class;

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
