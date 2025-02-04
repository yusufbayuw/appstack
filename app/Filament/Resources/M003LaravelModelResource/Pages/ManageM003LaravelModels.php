<?php

namespace App\Filament\Resources\M003LaravelModelResource\Pages;

use App\Filament\Resources\M003LaravelModelResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageM003LaravelModels extends ManageRecords
{
    protected static string $resource = M003LaravelModelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
