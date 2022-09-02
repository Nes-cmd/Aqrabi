<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    // use HasFactory;
    protected $guarded = [];
    public function order()
    {
        return $this->belongsTo(\App\Models\Order::class, 'order_id');
    }
    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class, 'product_id');
    }
    public function supplier()
    {
        return $this->hasOne(\App\Models\User::class, 'supplier_id');
    }
}
