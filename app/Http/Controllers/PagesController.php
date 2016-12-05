<?php

namespace App\Http\Controllers;

use App\Http\Services\ListingService;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    private $_listingService;

    public function __construct(ListingService $listingService) {
        $this->_listingService = $listingService;
    }

    public function home(){
        return view('pages.home');
    }

    public function forSale(){
        $listings = $this->_listingService->getListings();
        return view('pages.forSale')->with(compact('listings'));
    }

    public function faq(){
        return view('pages.faq');
    }

    public function contact(){
        return view('pages.contact');
    }
}
