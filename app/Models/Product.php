<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Product extends Model
{
    protected $guarded  = [];
    protected $casts = ['photos' => 'array'];
    protected function photos(): Attribute
    {
        if(!request()->is('api/*')){
              return Attribute::make(
                    get: fn ($value) => json_decode($value)
            );
         }
        return Attribute::make(get:
            function($value){
                $values = json_decode($value);
                $index = 0;
                foreach($values as $value){
                    $values[$index] =  env('APP_URL').'/storage/'.$value;
                    $index = $index + 1;
                }
                return $values;
            }
        );
    }
    protected function mainPhoto(): Attribute
    {
        if(!request()->is('api/*')){
              return Attribute::make(
                    get: fn ($value) => $value
            );
         }
        return Attribute::make(
            get: fn ($value) => env('APP_URL').'/storage/'.$value,
        );
    }
    public function categories()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id');
    }
    public function supplier()
    {
        return $this->belongsTo(\App\Models\User::class, 'supplier_id');
    }
    public function scopeFilter($query, $filters)
    {
        return $filters->apply($query);
    }
}

