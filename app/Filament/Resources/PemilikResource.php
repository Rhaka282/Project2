<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PemilikResource\Pages;
use App\Filament\Resources\PemilikResource\RelationManagers;
use App\Models\Pemilik;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PemilikResource extends Resource
{
    protected static ?string $model = Pemilik::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->label('Nama Pemilik')
                    ->required(),

                Forms\Components\TextInput::make('telepon')
                    ->label('Nomor Telepon')
                    ->tel()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama'),
                Tables\Columns\TextColumn::make('telepon')
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
            'index' => Pages\ListPemiliks::route('/'),
            'create' => Pages\CreatePemilik::route('/create'),
            'edit' => Pages\EditPemilik::route('/{record}/edit'),
        ];
    }
}
