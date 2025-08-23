<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('locale')) {
            $locale = session('locale');
            App::setLocale($locale);
            $langName = strtoupper($locale);
            session(['lang_name' => $langName]);
            session(['img_path' => $locale == "en" ? "img/united-states-of-america.png" : "img/vietnam.png"]);
        }

        return $next($request);
    }
}
