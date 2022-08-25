<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Supplier;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make([
                    Forms\Components\TextInput::make('name')->required(),
                    Forms\Components\TextInput::make('price')
                                                ->required()
                                                ->numeric(),
                    Forms\Components\TextInput::make('count')
                                                ->label('Stock amount')
                                                ->numeric(),
                    Forms\Components\Select::make('supplier_id')->label('Supplier')
                                            ->options(Supplier::all()->pluck('fullname', 'id'))
                                            ->required(),
                    Forms\Components\FileUpload::make('main_photo')->image()->required(),
                    Forms\Components\FileUpload::make('photos')->image()->multiple()->maxFiles(5),
                    Forms\Components\Textarea::make('description')->required(),
                    Forms\Components\Select::make('visiblity')
                                            ->options(['public' => 'Public', 'hidden' => 'Hidden'])
                                            ->default('public')->required(),
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }    
}
