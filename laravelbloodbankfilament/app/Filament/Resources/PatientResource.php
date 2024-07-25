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
                    TextInput::make('createdBy.name')->label('Created By')->readOnly(true),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('patientIdNo')->label('Patient ID No.')->searchable(),
                TextColumn::make('lastname')->searchable(),
                TextColumn::make('firstname')->searchable(),
                TextColumn::make('middlename')->searchable(),
                TextColumn::make('age'),
                TextColumn::make('gender'),
                TextColumn::make('createdBy.name')->label('Created By'),
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
