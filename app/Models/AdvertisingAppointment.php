<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertisingAppointment extends Model
{
    use HasFactory;

    protected $table = "adv_appoints";
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(AdvertisingCart::class, "user_id");
    }
}
