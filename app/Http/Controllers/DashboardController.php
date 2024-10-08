<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;

class DashboardController extends Controller
{
    //
    public function index()
    {
        //
        $menu = MenuItem::whereNull('parent_id')->get();
        return view('admin.dashboard.index', [
            'title' => 'Home',
            'subtitle' => 'Dashboard',
            'menuItem' => $menu,
        ]);
    }
}
