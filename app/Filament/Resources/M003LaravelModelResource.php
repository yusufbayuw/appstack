<?php

namespace App\Filament\Resources;

use App\Filament\Resources\M003LaravelModelResource\Pages;
use App\Filament\Resources\M003LaravelModelResource\RelationManagers;
use App\Models\M003LaravelModel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class M003LaravelModelResource extends Resource
{
    protected static ?string $model = M003LaravelModel::class;

    protected static ?string $navigationIcon = 'heroicon-o-puzzle-piece';

    protected static ?string $modelLabel = 'Laravel Model';

    protected static ?string $navigationLabel = 'Laravel Model';

    protected static ?string $slug = 'laravel-model';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('laravel_stack_id')
                    ->relationship('laravel_stack', 'name'),
                Forms\Components\TextInput::make('model_name')
                    ->required(),
                Forms\Components\Textarea::make('fields')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('relationships')
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
                Forms\Components\Textarea::make('command')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('laravel_stack.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('model_name')
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
            'index' => Pages\ManageM003LaravelModels::route('/'),
        ];
    }
}
