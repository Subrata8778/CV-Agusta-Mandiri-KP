<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyCart extends Model
{
    use HasFactory;
    
    protected $table = 'prop_carts';
    protected $guarded = ['id'];
}
