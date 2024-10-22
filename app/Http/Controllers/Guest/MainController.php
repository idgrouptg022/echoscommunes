<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Actualite;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class MainController extends Controller
{
    public function home(): View
    {
        $banner_news = Actualite::where('status', 1)->orderByDesc("created_at")->take(4)->get();
        $newsCategories = Actualite::join("categories", "actualites.category_id", "=", "categories.id")
        ->where("actualites.status", "=", 1)
        ->orderByDesc("actualites.created_at")
        ->select("categories.*")
        ->distinct()
        ->take(4)
        ->get();
        $page = "home";
        return view('pages.guests.home', compact('banner_news', 'page', 'newsCategories'));
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
