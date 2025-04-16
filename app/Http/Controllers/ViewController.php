<?php

namespace App\Http\Controllers;

use App\Models\LessonPackage;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function admin_dashboard()
    {
        return view('admin.dashboard');
    }

    public function home()
    {
        return view('dashboard', [
            'lesson_packages' => LessonPackage::all(),
        ]);
    }
}
