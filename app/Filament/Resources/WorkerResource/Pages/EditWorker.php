<?php

namespace App\Filament\Resources\WorkerResource\Pages;

use App\Filament\Resources\WorkerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWorker extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = WorkerResource::class;
    protected static ?string $title = 'Projects';

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
