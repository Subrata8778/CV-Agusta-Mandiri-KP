<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = "car_products";
    protected $guarded = ['id'];

    public function car_brand()
    {
        return $this->belongsTo(CarBrand::class, "car_brand_id");
    }

    public function car_cart()
    {
        return $this->belongsToMany(User::class, 'car_carts', 'car_product_id', 'user_id');
    }

    public function car_category()
    {
        return $this->belongsTo(CarCategory::class, "car_category_id");
    }

    public function car_photo()
    {
        return $this->hasMany(CarPhoto::class, "car_photo_id");
    }
}
