<?php
/**
 * Created by PhpStorm.
 * User: bramr
 * Date: 3/12/2016
 * Time: 16:37
 */

namespace App\Http\Services;


use App\Listing;

class ListingService
{
    public function getListings() {
        return Listing::all();
    }

    public function getActiveListings() {
        return Listing::where('active', true)->get();
    }
}