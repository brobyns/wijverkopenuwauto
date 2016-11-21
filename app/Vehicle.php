<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    public function vehiclesProperties()
    {
        return $this->belongsToMany('App\VehicleProperty', 'vehicle_vehicleproperty')->withTimestamps();
    }
}
