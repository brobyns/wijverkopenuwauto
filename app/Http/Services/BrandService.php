<?php
/**
 * Created by PhpStorm.
 * User: bramr
 * Date: 23/11/2016
 * Time: 19:21
 */

namespace App\Http\Services;


use App\Brand;

class BrandService
{
    public function getBrands() {
        return Brand::all();
    }

    public function getBrandsForDropdown() {
        return Brand::pluck('name', 'id');
    }
}