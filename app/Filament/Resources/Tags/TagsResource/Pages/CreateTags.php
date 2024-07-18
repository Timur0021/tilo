<?php

namespace App\Filament\Resources\Tags\TagsResource\Pages;

use App\Filament\Resources\Tags\TagsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTags extends CreateRecord
{
    protected static string $resource = TagsResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function afterCreate(): void
    {
        $this->redirect($this->getRedirectUrl());
    }
}
