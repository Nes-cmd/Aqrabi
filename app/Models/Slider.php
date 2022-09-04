<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Slider extends Model
{
    // use HasFactory;
    protected $guarded = [];
    protected function photoUrl(): Attribute
    {
        if(!request()->is('api/*')){
              return Attribute::make(
                    get: fn ($value) => json_decode($value)
            );
         }
        return Attribute::make(fn($value) => env('APP_URL').'/storage/'.$value);
    }
}
