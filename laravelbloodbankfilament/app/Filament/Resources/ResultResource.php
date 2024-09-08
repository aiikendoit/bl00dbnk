<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ResultResource\Pages;
use App\Filament\Resources\ResultResource\RelationManagers;
use App\Models\Result;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;

class ResultResource extends Resource
{
    protected static ?string $model = Result::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                DatePicker::make('transaction_date')->required()
                    ->label('Transaction Date')
                    ->columnSpan('full') // Make the input full width
                    ->format('m/d/Y'),

                // Select::make('patient_id')
                // ->label('Patient')
                // ->searchable()
                // ->columnSpan('full') // Make the input full width
                // ->relationship('patient', 'lastname'),

                Select::make('patient_id')->required()
                    ->preload() //to avoid error search
                    ->label('Patient')
                    ->searchable()
                    ->columnSpan('full') // Make the input full width
                    ->relationship('patient', 'full_name') // Use the custom accessor
                    ->options(function () {
                        return \App\Models\Patient::all()->pluck('full_name', 'id')->toArray();
                    }),

                Select::make('bgrh')->label('BGRH')->required()
                    ->columnSpan('full') // Make the input full width
                    ->native(false)
                    ->options([
                        '"A" Positive' => ' "A" Positive',
                        '"A" Negative' => ' "A" Negative',
                        '"B" Positive' => ' "B" Positive',
                        '"B" Negative' => ' "B" Negative',
                        '"AB" Positive' => ' "AB" Positive',
                        '"AB" Negative' => ' "AB" Negative',
                        '"O" Positive' => ' "O" Positive',
                        '"O" Negative' => ' "O" Negative',
                    ]),

                Select::make('result')->required()->native(false)
                    ->columnSpan('full') // Make the input full width
                    ->options([
                        'Positive' => ' Positive ',
                        'Negative' => ' Negative ',
                    ]),
                //select
                // Select::make('user_id')->required()->native(false)
                //     ->columnSpan('full') // Make the input full width
                //     ->label('Med Tech') //created by
                //     ->default(auth()->id())
                //     ->relationship('user', 'name')

                //textinput
                // Hidden field to store the user_id
                Forms\Components\Hidden::make('user_id')
                    ->default(auth()->id()),

                // TextInput for displaying the user's name, readOnly
                Forms\Components\TextInput::make('user_name')
                    ->default(auth()->user()->name) // Display the authenticated user's name
                    ->label('Med Tech')
                    ->readOnly(),

            ]);

    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('id')->label('No.')->sortable()->searchable(),
                TextColumn::make('transaction_date')->label('Transaction Date.')->sortable()->searchable(),
                // TextColumn::make('patient.lastname')->label('Patient Name')->sortable()->searchable(),
                TextColumn::make('patient.full_name')->label('Patient Name')->sortable()->searchable(),
                TextColumn::make('bgrh')->label('BGRH')->sortable()->searchable(),
                TextColumn::make('result')->label('Result')->sortable()->searchable(),
                TextColumn::make('user.name')->label('Med Tech')->sortable()->searchable(),

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
            'index' => Pages\ListResults::route('/'),
            'create' => Pages\CreateResult::route('/create'),
            'edit' => Pages\EditResult::route('/{record}/edit'),
        ];
    }
}
