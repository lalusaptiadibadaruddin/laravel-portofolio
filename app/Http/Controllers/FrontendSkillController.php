<?php

namespace App\Http\Controllers;

class FrontendSkillController extends Controller
{
    public function index()
    {
        //
        return view('frontend.keahlian', [
            'title' => 'Skill',
            'subtitle' => 'Halaman Skill',
        ]);
    }
}
