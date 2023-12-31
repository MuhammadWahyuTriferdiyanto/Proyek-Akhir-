<?php

namespace App\Filament\Resources;

use Filament\Tables;
use App\Models\Customer;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\CustomerResource\Pages; 
use App\Filament\Resources\CustomerResource\RelationManagers;

class CustomerResource extends Resource {

  protected static ?string $model = Customer::class;

  protected static ?string $navigationIcon = 'heroicon-o-collection';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        TextInput::make('name')
          ->required()
          ->maxLength(255),

        TextInput::make('email')  
          ->required()
          ->email()
          ->maxLength(255),

        TextInput::make('phone')
          ->required()
          ->maxLength(255),

        TextInput::make('address')
          ->required()
          ->maxLength(255),

        Select::make('Alpukat')->options(['Peluang','Miki','Has','Hawai','Mentari']),
            
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('name'),
        TextColumn::make('email'),
        TextColumn::make('phone'),
        TextColumn::make('address'),
        TextColumn::make('Alpukat'),
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
      'index' => Pages\ListCustomers::route('/'),
      'create' => Pages\CreateCustomer::route('/create'),
      'edit' => Pages\EditCustomer::route('/{record}/edit'),
    ];
  }

}