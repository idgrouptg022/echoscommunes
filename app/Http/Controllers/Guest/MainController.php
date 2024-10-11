<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class MainController extends Controller
{
    public function home(): View
    {
        return view('pages.guests.home');
    }

    public function about(): View
    {
        return view('pages.guests.about');
    }

    public function contact(): View
    {
        return view('pages.guests.contact');
    }
}
