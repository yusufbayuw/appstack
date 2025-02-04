<?php

namespace App\Filament\Resources;

use App\Filament\Resources\M005FilamentResourceResource\Pages;
use App\Filament\Resources\M005FilamentResourceResource\RelationManagers;
use App\Models\M005FilamentResource;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class M005FilamentResourceResource extends Resource
{
    protected static ?string $model = M005FilamentResource::class;

    protected static ?string $navigationIcon = 'heroicon-o-paint-brush';

    protected static ?string $modelLabel = 'Filament Resource';

    protected static ?string $navigationLabel = 'Filament Resource';

    protected static ?string $slug = 'filament-resource';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('laravel_migration_id')
                    ->relationship('laravel_migration', 'id'),
                Forms\Components\Repeater::make('fields')
                    ->schema([
                        Forms\Components\TextInput::make('name'),
                        Forms\Components\TextInput::make('type'),
                        Forms\Components\Textarea::make('config'),
                    ])
                    ->columnSpanFull(),
                Forms\Components\Repeater::make('columns')
                    ->schema([
                        Forms\Components\TextInput::make('name'),
                        Forms\Components\TextInput::make('type'),
                        Forms\Components\Textarea::make('config'),
                    ])
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('command')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('laravel_migration.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageM005FilamentResources::route('/'),
        ];
    }
}
