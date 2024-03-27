<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;

class CarCategory extends Model
{
    use HasFactory;

    protected $table = "car_categories";
    protected $guarded = ['id'];

    public function car()
    {
        return $this->hasMany(Car::class, "car_category_id");
    }
}
