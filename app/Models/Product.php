<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded  = [];
    protected $casts  = ['photos' => 'array'];
    public function categories()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id');
    }
    public function supplier()
    {
        return $this->belongsTo(\App\Models\User::class, 'supplier_id');
    }
}
