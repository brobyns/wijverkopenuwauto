<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    public function images(){
        return $this->hasMany('App\Image');
    }
}
