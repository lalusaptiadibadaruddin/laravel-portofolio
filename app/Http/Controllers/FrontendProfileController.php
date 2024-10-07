<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendProfileController extends Controller
{
    public function index()
    {
        //
        return view('frontend.profil', [
            'title' => 'Profile',
            'subtitle' => 'Halaman Profile',
        ]);
    }
}
