<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasName;

class User extends Authenticatable implements HasName, FilamentUser
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'fullname',
        'email',
        'phone',
        'profile_url',
        'password',
        'tin_number',
        'document_url'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function products()
    {
        return $this->hasMany(\App\Models\Product::class, 'supplier_id');
    }
    public function getFilamentName(): string
    {
        return $this->fullname;
    }
    public function canAccessFilament(): bool
    {
        return $this->hasRoles(['admin', 'supplier']);
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withPivot('status');
    }
    public function hasRole($role)
    {
        if($this->roles()->where('slug', $role)->first()){
            return true;
        } 
        return false;
    }
    public function hasVerifiedRole($role)
    {
        $data = $this->roles()->where('slug', $role)->first();
        if($data && $data->pivot->status == 'approved'){
            return true;
        } 
        return false;
    }
    public function hasRoles($roles)
    {
        $roles = $this->roles()->whereIn('slug', $roles)->get();
        if(count($roles) > 0){
            return true;
        }
        return false;
    }
    public function orders()
    {
        return $this->hasMany(\App\Models\OrderDetail::class, 'supplier_id');
    }
    public function customerOrders()
    {
        return $this->hasMany(\App\Models\Order);
    }
}
