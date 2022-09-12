<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Order extends Model
{
    // use HasFactory;
    protected $guarded = [];

    public function orderDetails()
    {
        return $this->hasMany(\App\Models\OrderDetail::class);
    }
    public function shippmentAdress()
    {
        return $this->belongsTo(\App\Models\Address::class,'address_id');
    }
}
