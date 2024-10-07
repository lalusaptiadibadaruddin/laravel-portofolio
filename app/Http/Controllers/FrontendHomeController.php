<?php

namespace App\Http\Controllers;

class FrontendHomeController extends Controller
{
    //
    //
    public function index()
    {
        //
        return view('frontend.home', [
            'title' => 'Home',
            'subtitle' => 'Halaman Home',
        ]);
    }
}
