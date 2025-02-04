<?php

namespace App\Filament\Resources\M002LaravelStackResource\Pages;

use App\Filament\Resources\M002LaravelStackResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageM002LaravelStacks extends ManageRecords
{
    protected static string $resource = M002LaravelStackResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
