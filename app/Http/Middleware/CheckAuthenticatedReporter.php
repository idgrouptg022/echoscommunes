<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Reporter;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAuthenticatedReporter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->session()->has("kentoMen")) {

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()->route('guests:login-view');

        } else {
            if (Reporter::where("identifiant", $request->session()->get('kentoMen'))->doesntExist()) {
                $request->session()->invalidate();

                $request->session()->regenerateToken();

                return redirect()->route('guests:login-view');
            }
        }
        return $next($request);
    }
}
