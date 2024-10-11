<?php

namespace App\Http\Controllers\Auth;

use App\Events\AcceptActualiteEvent;
use App\Events\RejectActualiteEvent;
use App\Models\User;
use App\Models\Category;
use App\Models\Actualite;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ActualiteRequest;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index(Category $category): View
    {
        $actualites = $category->news()->where([
            ['status', 1],
            ['reject_motif', null]
        ])->latest()->paginate(20);

        $user = User::where("login_token", session()->get('authenticate_token'))->first();

        return view('pages.auth.news.index', compact("category", "actualites", "user"));
    }

    public function create(Category $category): View
    {
        return view('pages.auth.news.create', compact("category"));
    }

    public function store(ActualiteRequest $request, Category $category): RedirectResponse
    {
        $fields = $request->validated();

        if (!$request->hasFile('image')) {
            return redirect()->back()->withErrors([
                'image' => 'Vous devez ajouter une image',
            ]);
        }

        $fields["image"] = $request->file("image")->store("actualites/$category->name", "public");

        $fields["category_id"] = $category->id;

        $fields["status"] = 1;

        $user = User::where("login_token", session()->get("authenticate_token"))->first();

        if ($user == null) {

            session()->flush();

            return redirect()->route("auth:login");
        }

        $user->actualites()->create($fields);

        return redirect()->route('auth:news:index', $category)->with('success', "L'actualité a été bien ajoutée et publiée");
    }

    public function show(Category $category, Actualite $actualite)
    {
        return view('pages.auth.news.show', compact("category", "actualite"));
    }

    public function edit(Category $category, Actualite $actualite): View
    {
        return view('pages.auth.news.edit', compact('actualite', 'category'));
    }

    public function update(ActualiteRequest $request, Actualite $actualite): RedirectResponse
    {
        $fields = $request->validated();

        if ($request->hasFile('image')) {

            if (Storage::disk("public")->exists($actualite->image)) {
                Storage::disk("public")->delete($actualite->image);
            }

            $fields["image"] = $request->file("image")->store("actualites/" . $actualite->category->name, "public");
        }

        $actualite->update($fields);

        return redirect()->route('auth:news:edit', [$actualite->category, $actualite])->with("success", "La modification a bien été effectuée");
    }

    public function destroy(Actualite $actualite): RedirectResponse
    {
        if (Storage::disk("public")->exists($actualite->image)) {
            Storage::disk("public")->delete($actualite->image);
        }

        $actualite->delete();

        return redirect()->route('auth:news:index', $actualite->category)->with("success", "L'actualité a bien été supprimée");
    }

    public function inPending(): View
    {
        $actualites = Actualite::where([
            ["status", 0],
            ["reject_motif", null]
        ])->orderByDesc('id')->get();

        return view('pages.auth.news.in-pending', compact('actualites'));
    }

    public function inPendingShow(Actualite $actualite): View
    {
        return view('pages.auth.news.in-pending-show', compact('actualite'));
    }

    public function rejectView(): View
    {
        $actualites = Actualite::where([
            ["reject_motif", "<>", null]
        ])->orderByDesc('id')->get();

        return view('pages.auth.news.reject', compact('actualites'));
    }

    public function rejectShow(Actualite $actualite): View
    {
        return view('pages.auth.news.reject-show', compact('actualite'));
    }

    public function accept(Actualite $actualite): RedirectResponse
    {
        $actualite->status = 1;

        $actualite->reject_motif = null;

        $actualite->save();

        $email = $actualite->authorable->email;
        $name = $actualite->authorable->name;
        $title = $actualite->title;

        $data = [
            "name" => $name,
            "title" => $title,
            "email" => $email,
            "actualite" => $actualite
        ];

        Event::dispatch(new AcceptActualiteEvent($data));

        return redirect()->route('auth:news:show', [$actualite->category, $actualite]);
    }

    public function reject(Request $request, Actualite $actualite): RedirectResponse
    {
        $request->validate([
            "motif_reject" => "required|string"
        ], [
            "motif_reject.required" => "Veuillez saisir un motif de rejet",
            "motif_reject.string" => "Le motif de rejet est incorrect. Veuillez renseigner du texte"
        ]);

        $actualite->reject_motif = $request->motif_reject;
        $actualite->save();

        $email = $actualite->authorable->email;
        $name = $actualite->authorable->name;
        $title = $actualite->title;

        $data = [
            "email" => $email,
            "name" => $name,
            "title" => $title,
            "motif_reject" => $actualite->reject_motif
        ];

        Event::dispatch(new RejectActualiteEvent($data));

        return redirect()->route('auth:news:reject-view')->with('success', "L'article a bien été rejeté");
    }
}
