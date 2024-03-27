<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function getRedirect()
    {
        $role = $this->role;

        if($role == "Customer"){
            return "customer/home";
        }
        else{
            return "admin/home";
        }
    }

    public function advertising_cart()
    {
        return $this->belongsToMany(Advertising::class, 'adv_carts', 'user_id', 'adv_product_id');
    }

    public function car_cart()
    {
        return $this->belongsToMany(Car::class, 'car_carts', 'user_id', 'car_product_id');
    }

    public function property_cart()
    {
        return $this->belongsToMany(Property::class, 'prop_carts', 'user_id', 'prop_product_id');
    }

    public function appoinment()
    {
        return $this->hasMany(Appointment::class, 'user_id');
    }
}
