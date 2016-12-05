<?php

namespace App\Http\Services;

use App\FuelType;

class FuelTypeService
{
    public function getFuelTypes() {
        return FuelType::all();
    }

    public function getFuelTypesForDropdown() {
        return FuelType::pluck('name', 'id');
    }
}