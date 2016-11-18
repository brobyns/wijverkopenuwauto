<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function earn(){
        return view('pages.earn');
    }

    public function faq(){
        return view('pages.faq');
    }

    public function tos(){
        return view('pages.tos');
    }

    public function privacy(){
        return view('pages.privacy');
    }

    public function contact(){
        return view('pages.contact');
    }
}
