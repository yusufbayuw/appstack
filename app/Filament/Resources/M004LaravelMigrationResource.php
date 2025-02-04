<?php

namespace App\Filament\Resources;

use App\Filament\Resources\M004LaravelMigrationResource\Pages;
use App\Filament\Resources\M004LaravelMigrationResource\RelationManagers;
use App\Models\M004LaravelMigration;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class M004LaravelMigrationResource extends Resource
{
    protected static ?string $model = M004LaravelMigration::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Laravel Migration';

    protected static ?string $navigationLabel = 'Laravel Migration';

    protected static ?string $slug = 'laravel-migration';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('laravel_model_id')
                    ->numeric(),
                Forms\Components\Repeater::make('fields')
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
                Tables\Columns\TextColumn::make('laravel_model_id')
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
            'index' => Pages\ManageM004LaravelMigrations::route('/'),
        ];
    }
}
