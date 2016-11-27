<?php
/**
 * Created by PhpStorm.
 * User: bramr
 * Date: 26/11/2016
 * Time: 13:04
 */

namespace App\Http\Services;


use App\VehicleModel;

class VehicleModelService
{
    public function getVehicleModels() {
        return VehicleModel::all();
    }

    public function getVehicleModelsForDropdown() {
        return VehicleModel::all()->pluck('name', 'id');
    }
}