<?php

namespace App\Http\Controllers\Guest;

use App\Events\ForgotPasswordEvent;
use App\Events\PasswordResetEvent;
use Carbon\Carbon;
use App\Models\Reporter;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Event;
use App\Http\Requests\ReporterRequest;
use App\Events\ReporterRegisteredEvent;
use App\Http\Requests\ReporterLoginRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;

class ReporterController extends Controller
{
    public function registerView(): View
    {
        return view('pages.guests.register');
    }

    public function register(ReporterRequest $request): RedirectResponse
    {
        $fields = $request->validated();

        $fields["password"] = Hash::make($fields["password"]);

        $reporter_token = "re-" . bin2hex(random_bytes(40));

        $fields["identifiant"] = $reporter_token;

        $reporter = Reporter::create($fields);

        $data = [
            "email" => $reporter->email,
            "firstname" => $reporter->firstname,
            "lastname" => $reporter->lastname,
        ];

        $request->session()->put("kentoMen", $reporter_token);
        $request->session()->put("name", $reporter->firstname . " " . $reporter->lastname);
        $request->session()->put("email", $reporter->email);
        $request->session()->put("profile", $reporter->profile);

        Event::dispatch(new ReporterRegisteredEvent($data));

        return redirect()->route('guests:reporters:dashboard');
    }

    public function loginView(): View
    {
        return view('pages.guests.login');
    }

    public function login(ReporterLoginRequest $request): RedirectResponse
    {
        $fields = $request->validated();

        $reporter = Reporter::where('email', $fields["email"])->first();

        if (!Hash::check($fields["password"], $reporter->password)) {
            return redirect()->back()->withErrors([
                "password" => "Mot de passe incorrect"
            ]);
        }

        $reporter_token = "re-" . bin2hex(random_bytes(40));

        $reporter->update([
            "identifiant" => $reporter_token
        ]);

        $request->session()->put("kentoMen", $reporter_token);
        $request->session()->put("name", $reporter->name);
        $request->session()->put("email", $reporter->email);
        $request->session()->put("profile", $reporter->profile);

        return redirect()->route('guests:reporters:dashboard');
    }

    public function forgotPasswordView(): View
    {
        return view('pages.guests.forgot-password');
    }

    public function forgotPassword(Request $request): RedirectResponse
    {
        $request->validate([
            "email" => "required|email"
        ], [
            "email.required" => "Veuillez saisir votre adresse email",
            "email.email" => "Veuillez saisir une adresse email valide"
        ]);

        $reporter = Reporter::where('email', $request->input("email"))->first();

        if ($reporter == null) {
            return redirect()->back()->withErrors([
                "email" => "Cette adresse email n'est pas associée à un compte"
            ]);
        }

        $this->sendVerificationCode($reporter);

        return redirect()->route('guests:new-password-view');
    }

    public function resendCode(Request $request): RedirectResponse
    {
        $email = Cookie::get("shuzumi");

        $reporter = Reporter::where('email', $email)->first();

        if ($reporter == null) {
            return redirect()->route("guests:forgot-password-view")->withErrors([
                "email" => "Une erreur est survenue. Veuillez renseigner votre mail"
            ]);
        }

        $this->sendVerificationCode($reporter);

        return redirect()->route('guests:new-password-view');
    }

    private function sendVerificationCode(Reporter $reporter): bool
    {
        $verification_code = random_int(2585258, 9999999);

        $expires_at = Carbon::now()->addMinutes(12);

        $reporter->update([
            "verification_code" => $verification_code,
            "verification_expires_at" => $expires_at
        ]);

        Cookie::queue("shuzumi", $reporter->email, 60);

        $data = [
            "name" => $reporter->name,
            "email" => $reporter->email,
            "verification_code" => $verification_code
        ];

        Event::dispatch(new ForgotPasswordEvent($data));

        return true;
    }

    public function newPasswordView(): View
    {
        return view('pages.guests.new-password');
    }

    public function newPassword(Request $request): RedirectResponse
    {
        $email = Cookie::get("shuzumi");

        $reporter = Reporter::where("email", $email)->first();

        if ($reporter == null) {
            return redirect()->route("guests:forgot-password-view")->withErrors([
                "email" => "Une erreur est survenue. Veuillez renseigner votre mail"
            ]);
        }

        if ($reporter->verification_expires_at < Carbon::now()) {
            return redirect()->route("guests:forgot-password-view")->withErrors([
                "email" => "Le code de vérification a expiré. Veuillez réessayer"
            ]);
        }

        if ($request->input("code") != $reporter->verification_code) {
            return redirect()->back()->withErrors([
                "code" => "Le code de vérification est incorrect. Veuillez réessayer"
            ]);
        }

        $request->validate([
            "password" => "required|min:7|confirmed"
        ], [
            "password.required" => "Le mot de passe est requis",
            "password.min" => "Le mot de passe doit faire au moins 7 caractères",
            "password.confirmed" => "Les mots de passe ne correspondent pas"
        ]);

        $reporter->update([
            "password" => Hash::make($request->password)
        ]);

        $reporter->verification_expires_at = null;

        $reporter->verification_code = null;

        $reporter->save();

        Cookie::queue("shuzumi", null);

        $data = [
            "email" => $reporter->email,
            "name" => $reporter->name
        ];

        Event::dispatch(new PasswordResetEvent($data));

        return redirect()->route("guests:login-view")->with("success", "Votre mot de passe a été modifié avec succès");
    }

    public function logout(Request $request): RedirectResponse
    {
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route("guests:login-view");
    }
}
