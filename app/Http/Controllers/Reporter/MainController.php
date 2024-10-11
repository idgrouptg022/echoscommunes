<?php

namespace App\Http\Controllers\Reporter;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function dashboard(): View
    {
        return view('pages.reporters.dashboard');
    }
}
