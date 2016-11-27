<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
    public function brand() {
        return $this->hasOne('App\Brand');
    }

    public function vehicles() {
        return $this->hasMany('App\Vehicle');
    }
}
