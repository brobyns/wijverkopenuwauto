<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    public function vehicle() {
        return $this->belongsTo('App\Vehicle');
    }

    public function images(){
        return $this->hasMany('App\Image');
    }
}
