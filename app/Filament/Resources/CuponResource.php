<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CuponResource\Pages;
use App\Filament\Resources\CuponResource\RelationManagers;
use App\Models\Cupon;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CuponResource extends Resource
{
    protected static ?string $model = Cupon::class;
    // protected static ?string $navigationGroup = 'Extras';
    protected static ?string $navigationIcon = 'heroicon-o-photograph';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([
                    Forms\Components\TextInput::make('code')->required(),
                    Forms\Components\TextInput::make('discount')->required()->numeric(),
                    Forms\Components\Select::make('discount_type')
                                            ->options(['fixed' => 'Fixed', 'percent' => 'Percent'])
                                            ->label('Discount type')
                                            ->required(),
                    Forms\Components\TextInput::make('givento_name'),
                    Forms\Components\TextInput::make('givento_phone')->required(),
                    Forms\Components\DateTimePicker::make('expire_at')
                                                ->required()
                                                ->minDate(now()),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code'),
                Tables\Columns\TextColumn::make('count'),
                Tables\Columns\TextColumn::make('discount'),
                Tables\Columns\TextColumn::make('discount_type'),
                Tables\Columns\TextColumn::make('givento_name'),
                Tables\Columns\TextColumn::make('givento_phone'),
                Tables\Columns\TextColumn::make('created_at')->date(),
                Tables\Columns\TextColumn::make('expire_at'),
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
            'index' => Pages\ListCupons::route('/'),
            'create' => Pages\CreateCupon::route('/create'),
            'edit' => Pages\EditCupon::route('/{record}/edit'),
        ];
    }    
}