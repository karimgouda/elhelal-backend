<?php

namespace App\Filament\Resources\FeatureResource\Pages;

use App\Filament\Resources\FeatureResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFeature extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = FeatureResource::class;

    protected static ?string $title = 'Sliders';

    protected function getActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
