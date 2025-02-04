<?php

namespace App\Filament\Resources;

use App\Filament\Resources\M001VmStackResource\Pages;
use App\Filament\Resources\M001VmStackResource\RelationManagers;
use App\Models\M001VmStack;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class M001VmStackResource extends Resource
{
    protected static ?string $model = M001VmStack::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'VM Stack';

    protected static ?string $navigationLabel = 'VM Stack';

    protected static ?string $slug = 'vm-stack';

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\TextEntry::make('stack_name'),
                Infolists\Components\RepeatableEntry::make('apt_packages')
                    ->schema([
                        Infolists\Components\TextEntry::make('name'),
                        Infolists\Components\TextEntry::make('description'),
                        Infolists\Components\RepeatableEntry::make('config')
                            ->schema([
                                Infolists\Components\TextEntry::make('name'),
                                Infolists\Components\TextEntry::make('detail')
                                    ->markdown(),
                            ])
                            ->contained(false),
                    ])
                    ->columnSpanFull()
                    ->contained(true)
                    ->grid(2),
                Infolists\Components\TextEntry::make('bash_script')
                    ->columnSpanFull(),
                Infolists\Components\TextEntry::make('os'),
                Infolists\Components\TextEntry::make('version'),
                Infolists\Components\TextEntry::make('description')
                    ->columnSpanFull(),
            ]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('stack_name')
                    ->required(),
                Forms\Components\Textarea::make('bash_script')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('os')
                    ->label('OS'),
                Forms\Components\TextInput::make('version'),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\Repeater::make('apt_packages')
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
                Tables\Columns\TextColumn::make('stack_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('os')
                    ->searchable(),
                Tables\Columns\TextColumn::make('version')
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
            'index' => Pages\ManageM001VmStacks::route('/'),
        ];
    }
}
