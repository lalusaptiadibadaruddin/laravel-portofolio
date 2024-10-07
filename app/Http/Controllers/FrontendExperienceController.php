<?php

namespace App\Http\Controllers;

class FrontendExperienceController extends Controller
{
    public function index()
    {
        //
        return view('frontend.pengalaman', [
            'title' => 'Experience',
            'subtitle' => 'Halaman Experience',
        ]);
    }
}
