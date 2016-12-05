<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleProperty extends Model
{

    protected $fillable = [
        'name'
    ];

    public function vehicles()
    {
        return $this->belongsToMany('App\Vehicle', 'vehicles_vehicle_properties')->withTimestamps();
    }
}
