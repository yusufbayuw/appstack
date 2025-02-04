<?php

namespace App\Filament\Resources;

use App\Filament\Resources\M002LaravelStackResource\Pages;
use App\Filament\Resources\M002LaravelStackResource\RelationManagers;
use App\Models\M002LaravelStack;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class M002LaravelStackResource extends Resource
{
    protected static ?string $model = M002LaravelStack::class;

    protected static ?string $navigationIcon = 'heroicon-o-cursor-arrow-ripple';

    protected static ?string $modelLabel = 'Laravel Stack';

    protected static ?string $navigationLabel = 'Laravel Stack';

    protected static ?string $slug = 'laravel-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('vm_stack_id')
                    ->relationship('vm_stack', 'id'),
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('laravel_version'),
                Forms\Components\Repeater::make('composer_packages')
                    ->schema([
                        Forms\Components\TextInput::make('name'),
                        Forms\Components\TextInput::make('description'),
                        Forms\Components\Repeater::make('config')
                            ->schema([
                                Forms\Components\TextInput::make('name'),
                                Forms\Components\MarkdownEditor::make('detail'),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('vm_stack.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('laravel_version')
                    ->searchable(),
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
            'index' => Pages\ManageM002LaravelStacks::route('/'),
        ];
    }
}
