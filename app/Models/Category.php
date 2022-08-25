<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
    protected $casts  = ['photos' => 'array'];
    public function products()
    {
        return $this->hasMany(\App\Models\Product::class);
    }
}
