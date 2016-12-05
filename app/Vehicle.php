<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracodes\Presenter\Traits\Presentable;

class Vehicle extends Model
{
    use Presentable;

    protected $presenter = 'App\Presenters\KilometersPresenter';

    public function listing() {
        return $this->hasOne('App\Listing');
    }

    public function vehicleProperties()
    {
        return $this->belongsToMany('App\VehicleProperty', 'vehicles_vehicle_properties')->withTimestamps();
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
