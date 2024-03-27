<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;

class CarBrand extends Model
{
    use HasFactory;

    protected $table = "car_brands";
    protected $guarded = ['id'];

    public function car()
    {
        return $this->hasMany(Car::class, "car_brand_id");
    }
}
