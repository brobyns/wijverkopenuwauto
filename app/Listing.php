<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use Sluggable;

    public function vehicle() {
        return $this->belongsTo('App\Vehicle');
    }

    public function images(){
        return $this->hasMany('App\Image');
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
