<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RumahResource\Pages;
use App\Filament\Resources\RumahResource\RelationManagers;
use App\Models\Rumah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RumahResource extends Resource
{
    protected static ?string $model = Rumah::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('alamat')
                    ->label('Alamat Rumah')
                    ->required(),

                Forms\Components\TextInput::make('kamar_tidur')
                    ->label('Jumlah Kamar Tidur')
                    ->numeric()
                    ->required(),

                Forms\Components\Select::make('desa_id')
                    ->label('Desa')
                    ->relationship('desa', 'nama')
                    ->required(),

                Forms\Components\Select::make('pemilik_id')
                    ->label('Pemilik')
                    ->relationship('pemilik', 'nama')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('alamat'),
                Tables\Columns\TextColumn::make('kamar_tidur'),
                Tables\Columns\TextColumn::make('desa.nama'),
                Tables\Columns\TextColumn::make('pemilik.nama')
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
            'index' => Pages\ListRumahs::route('/'),
            'create' => Pages\CreateRumah::route('/create'),
            'edit' => Pages\EditRumah::route('/{record}/edit'),
        ];
    }
}
