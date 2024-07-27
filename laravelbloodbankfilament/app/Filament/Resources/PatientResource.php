<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PatientResource\Pages;
use App\Filament\Resources\PatientResource\RelationManagers;
use App\Models\Patient;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;

class PatientResource extends Resource
{
    protected static ?string $model = Patient::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('patientIdNo')
                    ->label('Patient ID No.')
                    ->required()
                    ->maxLength(255),
                TextInput::make('lastname')

                    ->required()
                    ->maxLength(255),
                TextInput::make('firstname')

                    ->required()
                    ->maxLength(255),
                TextInput::make('middlename')

                    ->required()
                    ->maxLength(255),
                TextInput::make('age')
                    ->numeric()
                    ->required()
                    ->maxLength(3),
                Select::make('gender')
                    ->options([
                        'male' => 'Male',
                        'female' => 'Female',
                    ])
                    ->required(),
                TextInput::make('user_id')->default(auth()->id())->readOnly()->label('Created By'),//get auth id


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // TextColumn::make('id'),
                TextColumn::make('patientIdNo')->label('Patient ID No.')->searchable()->sortable(),
                // TextColumn::make('lastname')->searchable()->sortable(),
                // TextColumn::make('firstname')->searchable()->sortable(),
                // TextColumn::make('middlename')->searchable()->sortable(),
                TextColumn::make('full_name')->label('Full Name')->searchable()->sortable(), // concat lname, fname, mname



                TextColumn::make('age')->sortable(),
                TextColumn::make('gender')->sortable(),
                // TextColumn::make('user_id')->label('Created By'),
                TextColumn::make('user.name')->label('Created By'),
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
            'index' => Pages\ListPatients::route('/'),
            'create' => Pages\CreatePatient::route('/create'),
            'edit' => Pages\EditPatient::route('/{record}/edit'),
        ];
    }
}
