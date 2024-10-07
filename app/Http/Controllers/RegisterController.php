<?php

namespace App\Http\Controllers;

class RegisterController extends Controller
{
    //
    public function index()
    {
        //
        return view('register', [
            'title' => 'Register',
            'subtitle' => 'Form Register',
        ]);
    }
}
