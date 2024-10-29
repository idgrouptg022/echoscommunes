<?php

use App\Http\Controllers\Reporter\ActualiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\NewsController;
use App\Http\Controllers\Guest\MainController;
use App\Http\Controllers\Auth\CategoriesController;
use App\Http\Controllers\Auth\MainController as AuthMainController;
use App\Http\Controllers\Auth\MessagesController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Guest\ActualiteController as GuestActualiteController;
use App\Http\Controllers\Guest\ContactController;
use App\Http\Controllers\Guest\ReporterController;
use App\Http\Controllers\Reporter\MainController as ReporterMainController;

Route::prefix('/')->as('guests:')->group(function () {
    Route::get('', [MainController::class, 'home'])->name('home');

    Route::get('a-propos', [MainController::class, "about"])->name('about');

    Route::get('contact', [MainController::class, "contact"])->name('contact');

    Route::post('contact', [ContactController::class, "send"])->name('contact:send');

    Route::get('inscription', [ReporterController::class, "registerView"])->name('register-view');

    Route::post('inscription', [ReporterController::class, "register"])->name('register');

    Route::get('connexion', [ReporterController::class, "loginView"])->name('login-view');

    Route::post('connexion', [ReporterController::class, "login"])->name('login');

    Route::get("mot-de-passe-oublie", [ReporterController::class, "forgotPasswordView"])->name('forgot-password-view');

    Route::post("mot-de-passe-oublie", [ReporterController::class, "forgotPassword"])->name('forgot-password');

    Route::get("nouveau-mot-de-passe", [ReporterController::class, "newPasswordView"])->name('new-password-view');

    Route::post("nouveau-mot-de-passe", [ReporterController::class, "newPassword"])->name('new-password');

    Route::post("renvoyer-code", [ReporterController::class, "resendCode"])->name("resend-code");

    Route::middleware("check.auth.reporter")->prefix("reporter")->as("reporters:")->group(function () {

        Route::get('tableau-de-bord', [ReporterMainController::class, "dashboard"])->name('dashboard');

        Route::post("disconnection", [ReporterController::class, "logout"])->name("logout");

        Route::prefix('actualites')->as("actualites:")->group(function () {

            Route::get('nouveau', [ActualiteController::class, "create"])->name('create');

            Route::post('nouveau', [ActualiteController::class, 'store'])->name('store');

            Route::get("en-cours", [ActualiteController::class, "inPending"])->name("in-pending");

            Route::get('en-cours/{actualite}/details', [ActualiteController::class, "inPendingEdit"])->name('in-pending-edit');

            Route::patch('en-cours/{actualite}/details', [ActualiteController::class, "inPendingUpdate"])->name('in-pending-update');

            Route::get("rejetees", [ActualiteController::class, "reject"])->name("reject");

            Route::get('rejetees/{actualite}/details', [ActualiteController::class, "rejectEdit"])->name('reject-edit');

            Route::patch('rejetees/{actualite}/details', [ActualiteController::class, "rejectUpdate"])->name('reject-update');

            Route::delete('{actualite}/suppression', [ActualiteController::class, "destroy"])->name('destroy');

            Route::get("{category}", [ActualiteController::class, "index"])->name('index');

            Route::get('{actualite}/details', [ActualiteController::class, "show"])->name('show');

            Route::get('{actualite}/edition', [ActualiteController::class, "edit"])->name('edit');

            Route::patch('{actualite}/edition', [ActualiteController::class, "update"])->name('update');
        });
    });

    Route::prefix("actualites")->as("actualites:")->group(function () {
        Route::get("{category}", [GuestActualiteController::class, "index"])->name("index");

        Route::get("{category}/{actualite}", [GuestActualiteController::class, "show"])->name("show");
    });
});

Route::middleware("check.auth.user")->prefix('auth/')->as('auth:')->group(function () {
    Route::get('tableau-de-bord', [AuthMainController::class, 'dashboard'])->name('dashboard');

    Route::prefix('actualites/')->as("news:")->group(function () {

        Route::get('en-cours', [NewsController::class, 'inPending'])->name('in-pending');

        Route::get('en-cours/{actualite}/details', [NewsController::class, 'inPendingShow'])->name('in-pending-show');

        Route::get('rejetées', [NewsController::class, 'rejectView'])->name('reject-view');
        Route::get('rejetées/{actualite}/details', [NewsController::class, 'rejectShow'])->name('reject-show');

        Route::post('categories', [CategoriesController::class, 'store'])->name('categories:store');

        Route::patch('categories/{category}/update-processing', [CategoriesController::class, "update"])->name('categories:update');

        Route::delete('{category}/destroy', [CategoriesController::class, "destroy"])->name('categories:destroy');

        Route::get("{category}", [NewsController::class, "index"])->name('index');

        Route::get('{category}/creation', [NewsController::class, "create"])->name('create');

        Route::post('{category}/creation', [NewsController::class, "store"])->name('store');

        Route::get("{category}/{actualite}/edition", [NewsController::class, "edit"])->name('edit');

        Route::get("{category}/{actualite}/details", [NewsController::class, "show"])->name('show');

        Route::patch("{actualite}/update", [NewsController::class, "update"])->name('update');

        Route::post("{actualite}/validation", [NewsController::class, "accept"])->name('accept');

        Route::post("{actualite}/rejection", [NewsController::class, "reject"])->name('reject');

        Route::delete("{actualite}/destroy", [NewsController::class, "destroy"])->name('destroy');
    });

    Route::prefix("messages")->as("messages:")->group(function () {
        Route::get('', [MessagesController::class, "index"])->name('index');

        Route::get('{contact}/show', [MessagesController::class, "show"])->name('show');
    });

    Route::prefix('administrateurs/')->as('users:')->group(function () {
        Route::get('', [UserController::class, "index"])->name('index');

        Route::post('register', [UserController::class, "register"])->name('register');

        Route::post('logout', [UserController::class, "logout"])->name('logout');
    });

    Route::withoutMiddleware("check.auth.user")->group(function () {
        Route::get('login', [UserController::class, "loginView"])->name("login:view");

        Route::post('login', [UserController::class, "login"])->name("login");
    });
});
