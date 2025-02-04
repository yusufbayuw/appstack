<?php

namespace App\Filament\Resources\M001VmStackResource\Pages;

use App\Filament\Resources\M001VmStackResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageM001VmStacks extends ManageRecords
{
    protected static string $resource = M001VmStackResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
