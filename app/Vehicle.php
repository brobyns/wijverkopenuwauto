<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    public function vehiclesProperties()
    {
        return $this->hasMany('App\VehicleProperty');
    }
}
