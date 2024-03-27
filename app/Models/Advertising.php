<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advertising extends Model
{
    use HasFactory;

    protected $table = "adv_products";
    protected $guarded = ['id'];

    // public function appointment()
    // {
    //     return $this->belongsToMany(Appointment::class, "adv_carts", "adv_product_id", "appointment_id");
    // }

    public function advertising_cart()
    {
        return $this->belongsToMany(User::class, 'adv_carts', 'adv_product_id', 'user_id')->withTimestamps();
    }

    public function advertising_photo()
    {
        return $this->hasMany(AdvertisingPhoto::class, "adv_photo_id");
    }
}
