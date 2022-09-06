<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    // use HasFactory;
    protected $guarded = [];
    public $timestamps = false;
    public function setCreatedAtAttribute($value) { 
        $this->attributes['created_at'] = \Carbon\Carbon::now(); 
    }
}
