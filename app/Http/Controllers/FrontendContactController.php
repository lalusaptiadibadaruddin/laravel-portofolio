<?php

namespace App\Http\Controllers;

class FrontendContactController extends Controller
{
    public function index()
    {
        //
        return view('frontend.kontak', [
            'title' => 'Kontak',
            'subtitle' => 'Halaman Kontak',
        ]);
    }
}
