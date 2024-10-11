<?php

namespace App\Http\Controllers\Auth;

use App\Models\Category;
use App\Models\Actualite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CategoriesRequest;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    public function store(CategoriesRequest $request): RedirectResponse
    {
        $fields = $request->validated();

        $category = Category::create($fields);

        return redirect()->route("auth:news:index", $category)->with("success", "La catégoriea été créée avec succès");
    }

    public function update(Category $category, CategoriesRequest $request): RedirectResponse
    {
        $fields = $request->validated();

        $category->update($fields);

        return redirect()->route("auth:news:index", $category)->with("success", "La catégorie a été modifiée avec succès");
    }

    public function destroy(Category $category): RedirectResponse
    {
        $actualites = Actualite::where("category_id", $category->id)->get();

        foreach ($actualites as $actualite) {

            if ($actualite->image != null) {
                // unlink(public_path($actualite->image));
                if (Storage::disk('public')->exists($actualite->image)) {
                    Storage::disk('public')->delete($actualite->image);
                }
            }

            $actualite->delete();
        }

        $category->delete();

        return redirect()->route("auth:dashboard")->with("success", "La catégorie et les actualités ont été supprimées avec succès");
    }
}
