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
use App\Models\Role;
use App\Models\Category;
use Filament\Forms\Components\Tabs\Tab;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static bool $shouldRegisterNavigation = true;
    protected static ?string $navigationIcon = 'heroicon-o-folder-open';
    protected static ?string $recordTitleAttribute = 'productname';

    public static function form(Form $form): Form
    { 
        return $form
            ->schema([
                Forms\Components\Card::make([
                    Forms\Components\TextInput::make('productname')->required(),
                    Forms\Components\TextInput::make('price')
                                                ->required()
                                                ->numeric(),
                    Forms\Components\TextInput::make('count')
                                                ->label('Stock amount')
                                                ->numeric(),
                    Forms\Components\Select::make('supplier_id')->label('Supplier')
                                            ->options(Role::with('users')->where('slug', 'supplier')->first()['users']->pluck('fullname', 'id'))
                                            ->required()
                                            ->reactive(),
                    Forms\Components\Select::make('category_id')
                                            ->required()
                                            ->options(Category::all()->pluck('name', 'id'))
                                            ->label('Category'),
                    Forms\Components\FileUpload::make('main_photo')->image()->required(),
                    Forms\Components\FileUpload::make('photos')->image()->multiple()->maxFiles(5),
                    Forms\Components\Select::make('visiblity')
                                            ->options(['1' => 'Public', '0' => 'Hidden'])
                                            ->default('1')->required(),
                    Forms\Components\Textarea::make('description')->required(),
                    
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('main_photo'),
                Tables\Columns\TextColumn::make('productname'),
                Tables\Columns\TextColumn::make('count')->label('Stock amount'),
                Tables\Columns\TextColumn::make('price'),
                Tables\Columns\TextColumn::make('categories.name')->label('Category'),
                Tables\Columns\TextColumn::make('supplier.fullname')->label('Supplier'),
                Tables\Columns\BooleanColumn::make('visiblity'),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }    
}
