<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    public function vehicle() {
        return $this->hasOne('App\Listing');
    }

    public function vehiclesProperties()
    {
        return $this->belongsToMany('App\VehicleProperty', 'vehicle_vehicle_properties')->withTimestamps();
    }

    public function brand() {
        return $this->belongsTo('App\Brand');
    }

    public function vehicleModel() {
        return $this->belongsTo('App\VehicleModel');
    }

    public function fuelType() {
        return $this->belongsTo('App\FuelType');
    }
}
