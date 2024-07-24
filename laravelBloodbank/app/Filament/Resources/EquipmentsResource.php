<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EquipmentsResource\Pages;
use App\Filament\Resources\EquipmentsResource\RelationManagers;
use App\Models\Equipments;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;


class EquipmentsResource extends Resource
{
    protected static ?string $model = Equipments::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        $user = Auth::user();
        return $form
            ->schema([
                //
                // TextInput::make('fk_createdBy_user')
                //     ->default($user->id) // Set the default value to the user's ID
                //     ->disabled(), // Make the field disabled to prevent user modification
                TextInput::make('name')->required(),
                TextInput::make('brand')->required(),
                TextInput::make('model')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('id')->label('Code')->sortable()->searchable(),
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('brand')->sortable()->searchable(),
                TextColumn::make('model')->sortable()->searchable(),
                TextColumn::make('fk_createdByUserName')->label('Created By')->badge()->toggleable(isToggledHiddenByDefault: true), //retrieve name instead of ID
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListEquipments::route('/'),
            'create' => Pages\CreateEquipments::route('/create'),
            'edit' => Pages\EditEquipments::route('/{record}/edit'),
        ];
    }
}
