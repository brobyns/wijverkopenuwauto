<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function vehicles() {
        return $this->hasMany('App\Vehicle');
    }

    public function models() {
        return $this->hasMany('App\VehicleModel');
    }

}
