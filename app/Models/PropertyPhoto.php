<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Property;

class PropertyPhoto extends Model
{
    use HasFactory;

    protected $table = "prop_photos";
    protected $guarded = ['id'];

    public function property()
    {
        return $this->belongsTo(Property::class, "prop_photo_id")->withTrashed();
    }
}
