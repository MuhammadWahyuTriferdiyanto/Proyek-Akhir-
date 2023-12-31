<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Avocado;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\AvocadoResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AvocadoResource\RelationManagers;
use Filament\Forms\Components\FileUpload;

class AvocadoResource extends Resource
{
    protected static ?string $model = Avocado::class;
    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('no')->required()->type('number')->integer(),
                        TextInput::make('nama')->required(),
                        FileUpload::make('gambar')->required()->image(), // Tambahkan ->image()
                        TextInput::make('keterangan')->required(),
                        TextInput::make('berat')->required()->type('number')->rules('min:0'),
                        TextInput::make('harga')->required()->type('number')->rules('min:0'),
                        TextInput::make('stok')->required()->type('number')->rules('min:0'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('no'),
                TextColumn::make('nama'),
                ImageColumn::make('gambar'),
                TextColumn::make('keterangan'),
                TextColumn::make('berat'),
                TextColumn::make('harga'),
                TextColumn::make('stok'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListAvocados::route('/'),
            'create' => Pages\CreateAvocado::route('/create'),
            'edit' => Pages\EditAvocado::route('/{record}/edit'),
        ];
    }
}
