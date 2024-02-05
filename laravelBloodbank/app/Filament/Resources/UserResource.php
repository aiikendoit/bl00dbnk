<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;



class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $modelLabel = 'User Management'; //model label resource

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('name')->required(),
                TextInput::make('email')->email()->required(),
                TextInput::make('password')->password()->required()->revealable(),

                // auth()->user()->role !== 'user' ?
                // TextInput::make('password')->password()->required()->revealable() :
                // null,

                FileUpload::make('image')->disk('public')->directory('images'),
                // Select::make('role')
                //     ->options(User::all()->pluck('role', 'id')),
                Select::make('role')
                    ->options([
                        'superadmin' => 'superadmin',
                        'admin' => 'admin',
                        'user' => 'user',
                    ]),
                Select::make('status')
                    ->options([
                        'active' => 'active',
                        'inactive' => 'inactive',

                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('id')->label('Code'),
                TextColumn::make('name'),
                TextColumn::make('email'),
                TextColumn::make('role')->badge()
                    ->color(function (string $state): string {
                        if ($state === 'superadmin') {
                            return 'success';
                        } else if ($state === 'admin') {
                            return 'info';
                        } else {
                            return 'warning';
                        }
                    }),
                ImageColumn::make('image')->label('Avatar'),
                TextColumn::make('status')
                    ->badge()
                    ->color(function (string $state): string {
                        if ($state == 'active') {
                            return 'success';
                        } else {
                            return 'danger';
                        }
                    }),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
