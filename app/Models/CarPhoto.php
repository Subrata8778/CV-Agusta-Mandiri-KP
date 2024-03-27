<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarPhoto extends Model
{
    use HasFactory;

    protected $table = "car_photos";
    protected $guarded = ['id'];
    
    public function car()
    {
        return $this->belongsTo("App\Models\Car", "car_photo_id")->withTrashed();
    }
}
