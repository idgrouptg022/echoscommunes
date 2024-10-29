<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Actualite;
use App\Models\Category;
use Illuminate\Contracts\View\View;

class ActualiteController extends Controller
{
    public function index(Category $category): View
    {
        if ($category == null) {
            abort(404);
        }

        $actualites = $category->news()->where("status", "=" , 1)->latest()->get();

        return view("pages.guests.actualites.index", compact("category", "actualites" ));
    }

    public function show(Category $category, Actualite $actualite): View
    {
        if ($category == null) {
            abort(404);
        }

        if ($actualite == null) {
            abort(404);
        }

        $actualites = $category->news()->where("status", "=" , 1)
        ->whereNotIn("id", [$actualite->id])
        ->latest()->take(4)->get()->shuffle();

        return view("pages.guests.actualites.show", compact("category","actualite", "actualites"));
    }
}
