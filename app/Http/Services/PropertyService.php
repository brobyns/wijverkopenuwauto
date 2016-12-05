<?php
/**
 * Created by PhpStorm.
 * User: bramr
 * Date: 28/11/2016
 * Time: 18:24
 */

namespace App\Http\Services;


use App\VehicleProperty;

class PropertyService
{
    public function getProperties() {
        return VehicleProperty::all();
    }
}