<?php

namespace App\Filament\Resources\M004LaravelMigrationResource\Pages;

use App\Filament\Resources\M004LaravelMigrationResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageM004LaravelMigrations extends ManageRecords
{
    protected static string $resource = M004LaravelMigrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
