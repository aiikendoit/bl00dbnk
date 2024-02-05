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
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\ImageColumn;



class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $modelLabel = 'User Managements'; //model label resource

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Section::make('Add New') //layouts
                    ->description('Adding Users bla bla bla')
                    ->collapsible()
                    ->schema([


                        TextInput::make('name')->required(),
                        TextInput::make('email')->email()->required(),
                        TextInput::make('password')->password()->required()->revealable()->rules(['min:8', 'max:20'])->ascii(),

                        Select::make('role')->visibleOn(['update', 'edit']) //create, update, delete, view
                            ->options([
                                'superadmin' => 'superadmin',
                                'admin' => 'admin',
                                'user' => 'user',
                            ]),

                        Select::make('status')->visibleOn(['update', 'edit']) //create, update, delete, view
                            ->options([
                                'active' => 'active',
                                'inactive' => 'inactive',

                            ]),
                    ])->columnSpan(2)->columns(2),

                Section::make("Image")
                    ->schema([
                        FileUpload::make('image')->disk('public')->directory('images')->columnSpan('full'), //->columnSpanFull()
                    ])->columnSpan(1),

                // auth()->user()->role !== 'user' ?
                // TextInput::make('password')->password()->required()->revealable() :
                // null,

                // Select::make('role')
                //     ->options(User::all()->pluck('role', 'id')),



            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('id')->label('Code')->sortable()->searchable()->toggleable(isToggledHiddenByDefault: true), //->sortable()->searchable() ->toggleable()
                TextColumn::make('name')->sortable()->searchable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('email')->sortable()->searchable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('role')->badge()->sortable()->searchable()->toggleable(isToggledHiddenByDefault: true)
                    ->color(function (string $state): string {
                        if ($state === 'superadmin') {
                            return 'success';
                        } else if ($state === 'admin') {
                            return 'info';
                        } else {
                            return 'warning';
                        }
                    }),
                ImageColumn::make('image')->label('Avatar')->circular()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('status')->toggleable(isToggledHiddenByDefault: true)
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
