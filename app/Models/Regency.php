<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{
    use HasFactory;
    protected $table = "regencies";

    public function province()
    {
        return $this->belongsTo(Province::class, "province_id");
    }

    public function district()
    {
        return $this->hasMany(District::class, "district_id");
    }
}
