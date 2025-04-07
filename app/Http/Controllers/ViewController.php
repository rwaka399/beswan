<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function admin_dashboard()
    {
        return view('admin.dashboard');
    }
}
