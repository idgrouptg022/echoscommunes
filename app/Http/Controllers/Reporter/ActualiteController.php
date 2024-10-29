<?php

namespace App\Http\Controllers\Reporter;

use App\Models\Category;
use App\Models\Reporter;
use App\Models\Actualite;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Reporter\ActualiteRequest;

class ActualiteController extends Controller
{

    public function index(Category $category): View
    {
        $reporter = Reporter::where("identifiant", session()->get("kentoMen"))->first();

        $actualites = $reporter->actualites()->where([
            ['status', 1],
            ['reject_motif', null],
            ['category_id', $category->id]
        ])->latest()->paginate(20);

        return view('pages.reporters.actualites.index', compact("category", "actualites"));
    }

    public function create($category = null): View
    {
        $categories = Category::orderBy("name")->get();
        return view('pages.reporters.actualites.create', compact('categories'));
    }

    public function store(ActualiteRequest $request): RedirectResponse
    {
        if (!$request->hasFile('image')) {
            return redirect()->back()->withErrors([
                'image' => 'Vous devez ajouter une image',
            ]);
        }

        $fields = $request->validated();

        $category = Category::where('slug', $request->category)->first();

        $fields["image"] = $request->file("image")->store("actualites/$category->name", "public");

        $fields["category_id"] = $category->id;

        $reporter = Reporter::where("identifiant", session()->get("kentoMen"))->first();

        if ($reporter == null) {

            session()->flush();

            return redirect()->route("guests:login-view");
        }

        $reporter->actualites()->create($fields);

        return redirect()->route('guests:reporters:actualites:in-pending')->with("success", "L'actualité a été ajoutée avec succès. Elle est en attente de validation");
    }

    public function edit(Actualite $actualite): RedirectResponse|View
    {
        $reporter = Reporter::where("identifiant", session()->get("kentoMen"))->first();

        if ($reporter->id !== $actualite->authorable->id) {
            return redirect()->back();
        }

        $categories = Category::orderBy("name")->get();

        $category = $actualite->category;

        return view("pages.reporters.actualites.edit", compact('actualite', 'categories', 'category'));
    }

    public function show(Actualite $actualite): View
    {
        $reporter = Reporter::where("identifiant", session()->get("kentoMen"))->first();

        if ($reporter->id !== $actualite->authorable->id) {
            abort(404);
        }

        $category = $actualite->category;

        return view("pages.reporters.actualites.show", compact('category', 'actualite'));

    }

    public function inPending(): View
    {
        $reporter = Reporter::where("identifiant", session()->get("kentoMen"))->first();

        $actualites =  $reporter->actualites()->where([
            ["status", 0],
            ["reject_motif", null]
        ])->orderByDesc('id')->get();

        return view('pages.reporters.actualites.in-pending', compact('actualites'));
    }

    public function inPendingEdit(Actualite $actualite): RedirectResponse|View
    {
        $reporter = Reporter::where("identifiant", session()->get("kentoMen"))->first();

        if ($reporter->id !== $actualite->authorable->id) {
            return redirect()->route('guests:reporters:actualites:in-pending');
        }

        $categories = Category::orderBy("name")->get();

        return view("pages.reporters.actualites.in-pending-edit", compact('actualite', 'categories'));
    }

    public function inPendingUpdate(ActualiteRequest $request, Actualite $actualite): RedirectResponse
    {
        $this->updator($request, $actualite);
        return redirect()->route('guests:reporters:actualites:in-pending-edit', $actualite)->with("success", "La modification a bien été effectuée");
    }

    public function reject(): View
    {
        $reporter = Reporter::where("identifiant", session()->get("kentoMen"))->first();

        $actualites =  $reporter->actualites()->where([
            ["reject_motif", "<>", null]
        ])->orderByDesc('id')->get();

        return view('pages.reporters.actualites.reject', compact('actualites'));
    }

    public function rejectEdit(Actualite $actualite): RedirectResponse|View
    {
        $reporter = Reporter::where("identifiant", session()->get("kentoMen"))->first();

        if ($reporter->id !== $actualite->authorable->id) {
            return redirect()->route('guests:reporters:actualites:reject');
        }

        $categories = Category::orderBy("name")->get();

        return view("pages.reporters.actualites.reject-edit", compact('actualite', 'categories'));
    }

    public function rejectUpdate(ActualiteRequest $request, Actualite $actualite): RedirectResponse
    {
        $this->updator($request, $actualite);

        $actualite->status = 0;

        $actualite->reject_motif = null;

        $actualite->save();

        return redirect()->route('guests:reporters:actualites:in-pending-edit', $actualite)->with("success", "La modification a bien été effectuée");
    }

    public function update(ActualiteRequest $request, Actualite $actualite): RedirectResponse
    {
        $this->updator($request, $actualite);
        return redirect()->route('guests:reporters:actualites:edit', $actualite)->with("success", "La modification a bien été effectuée");
    }

    private function updator(ActualiteRequest $request, Actualite $actualite): bool
    {

        $reporter = Reporter::where("identifiant", session()->get("kentoMen"))->first();

        if ($reporter->id !== $actualite->authorable->id) {
            abort(403);
        }

        $fields = $request->validated();

        if ($request->hasFile('image')) {

            if (Storage::disk("public")->exists($actualite->image)) {
                Storage::disk("public")->delete($actualite->image);
            }

            $fields["image"] = $request->file("image")->store("actualites/" . $actualite->category->name, "public");
        }

        $category = Category::where('slug', $request->category)->first();

        $fields["category_id"] = $category->id;

        $actualite->update($fields);

        return true;
    }

    public function destroy(Actualite $actualite): RedirectResponse
    {
        $reporter = Reporter::where("identifiant", session()->get("kentoMen"))->first();

        if ($reporter->id !== $actualite->authorable->id) {
            abort(403);
        }

        if (Storage::disk("public")->exists($actualite->image)) {
            Storage::disk("public")->delete($actualite->image);
        }

        $actualite->delete();

        return redirect()->back()->with('success', 'Actualité supprimée avec succès');

    }
}
