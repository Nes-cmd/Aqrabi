<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use App\Models\OrderDetail;
use Closure;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class LatestOrders extends BaseWidget
{
    public static function canView():bool
    {
        return auth()->user()->hasRole('supplier');
    }
    protected function getTableQuery(): Builder
    {
        return OrderDetail::with('product')->where('supplier_id', auth()->user()->id)->latest()->limit(10);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('product.productname')->label('Product'),
            Tables\Columns\TextColumn::make('product.price')->label('Price'),
            Tables\Columns\TextColumn::make('quantity')->label('Quantity'),
            Tables\Columns\TextColumn::make('created_at')->label('Ordered at')->date(),
        ];
    }
    protected function isTablePaginationEnabled():bool
    {
        return false;
    }
}
