<?php

namespace App\Filament\Resources\M005FilamentResourceResource\Pages;

use App\Filament\Resources\M005FilamentResourceResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageM005FilamentResources extends ManageRecords
{
    protected static string $resource = M005FilamentResourceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
