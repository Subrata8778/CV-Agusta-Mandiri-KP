<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Appointment;
// use App\Models\PropertyCategory;
use App\Models\PropertyPhoto;

class Property extends Model
{
    use HasFactory;

    protected $table = "prop_products";
    protected $guarded = ['id'];

    public function property_cart()
    {
        return $this->belongsToMany(User::class, 'prop_carts', 'prop_product_id', 'user_id');
    }

    public function property_photo()
    {
        return $this->hasMany(PropertyPhoto::class, "prop_photo_id");
    }

    public function village()
    {
        return $this->belongsTo(Village::class, "village_id");
    }
}
