<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table = "appointments";
    protected $guarded = ['id'];

    public function advertising()
    {
        return $this->belongsToMany("App\Models\Advertising", "adv_carts", "appointment_id", "adv_product_id")->withTrashed();
    }

    public function car()
    {
        return $this->belongsToMany("App\Models\Car", "car_carts", "appointment_id", "car_product_id")->withTrashed();
    }

    public function property()
    {
        return $this->belongsToMany("App\Models\Property", "prop_carts", "appointment_id", "prop_product_id")->withTrashed();
    }

    public function trade()
    {
        return $this->hasOne("App\Models\Trade", "appointment_id")->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
