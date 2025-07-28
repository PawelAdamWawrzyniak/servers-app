<?php

namespace App\Filament\Resources;

use App\Enums\ServerStatus;
use App\Filament\Resources\ServerResource\Pages;
use App\Models\Server;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ServerResource extends Resource
{
    protected static ?string $model = Server::class;

    protected static ?string $navigationIcon = 'heroicon-o-server-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make(name: 'name')
                    ->required()
                    ->maxLength(length:100),
                Forms\Components\TextInput::make(name: 'ip_address')
                    ->required()
                    ->ipv4(),
                Forms\Components\TextInput::make(name: 'port')
                    ->required()
                    ->numeric()
                    ->maxValue(value:65535),
                Forms\Components\Select::make(name: 'status')
                    ->options(options: ServerStatus::class)
                    ->disabled(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make(name: 'id')
                    ->label(label: 'ID')
                    ->searchable(),
                Tables\Columns\TextColumn::make(name: 'name')
                    ->searchable(),
                Tables\Columns\TextColumn::make(name: 'ip_address')
                    ->searchable(),
                Tables\Columns\TextColumn::make(name: 'port')
                    ->searchable(),
                Tables\Columns\TextColumn::make(name: 'status')
                    ->searchable(),
                Tables\Columns\TextColumn::make(name: 'created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make(name: 'updated_at')
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServers::route(path:'/'),
            'create' => Pages\CreateServer::route(path:'/create'),
            'view' => Pages\ViewServer::route(path:'/{record}'),
            'edit' => Pages\EditServer::route(path:'/{record}/edit'),
        ];
    }
}
