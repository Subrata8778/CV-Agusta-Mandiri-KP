<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $table = "districts";

    public function regency()
    {
        return $this->belongsTo(Regency::class, "regency_id");
    }

    public function village()
    {
        return $this->hasMany(Village::class, "village_id");
    }
}
