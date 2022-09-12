<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\Country;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Table as TablesTable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([
                    Forms\Components\TextInput::make('fullname')->label('Full name')->required(),
                    Forms\Components\Select::make('dial_code')
                        ->options(Country::all()->map(fn ($value) => [$value->name . '(' . $value->dial_code . ')', $value->dial_code])->pluck(0, 1))
                        ->required(),
                    Forms\Components\TextInput::make('phone')->required()->minLength(9)->maxLength(10),
                    Forms\Components\TextInput::make('email')->required()->email(),
                    Forms\Components\TextInput::make('password')
                        ->password()
                        ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                        ->dehydrated(fn ($state) => filled($state))
                        ->required(fn (string $context): bool => $context === 'create')
                ])
            ]);
    }
    public static function canViewAny(): bool
    {
        return auth()->user()->hasVerifiedRole('admin');
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('fullname'),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('created_at')->date(),
            ])
            ->filters([
                // Tables\Filters\Filter::make('created_at')->label('Featured')
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
            RelationManagers\RolesRelationManager::class
        ];
    }
    public static function getWidgets(): array
    {
        return [
            \App\Filament\Resources\UserResource\Widgets\StatsOverview::class,
        ];
    }
    public static function getHeaderWidgets(): array
    {
        return [
            \App\Filament\Resources\UserResource\Widgets\StatsOverview::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
