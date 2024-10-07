<?php

namespace App\Http\Controllers;

class LoginController extends Controller
{

    //
    public function index()
    {
        //
        return view('login', [
            'title' => 'Login',
            'subtitle' => 'Form Login',
        ]);
    }
}
