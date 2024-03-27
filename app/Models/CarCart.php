<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarCart extends Model
{
    use HasFactory;
    
    protected $table = 'car_carts';
    protected $guarded = ['id'];
}
