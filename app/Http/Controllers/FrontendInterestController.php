<?php

namespace App\Http\Controllers;

class FrontendInterestController extends Controller
{
    public function index()
    {
        //
        return view('frontend.minat', [
            'title' => 'Interest',
            'subtitle' => 'Halaman Interest',
        ]);
    }
}
