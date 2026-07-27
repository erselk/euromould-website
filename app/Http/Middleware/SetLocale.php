<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $path = $request->getPathInfo();
        $slug = ltrim($path, '/');
        $slugMap = get_slug_map();

        // 1. If URL starts with /en or matches an English slug, active language is English
        if (str_starts_with($path, '/en') || isset($slugMap[$slug])) {
            App::setLocale('en');
            session(['locale' => 'en']);
            return $next($request);
        }

        // 2. Language switcher route /lang/{locale} must always proceed directly
        if (str_starts_with($path, '/lang')) {
            return $next($request);
        }

        // 3. First-time non-TR visitor detection (only on root '/' on first GET request, excluding bots)
        if ($path === '/' && !$request->session()->has('visited') && $request->isMethod('GET')) {
            $request->session()->put('visited', true);

            $userAgent = strtolower($request->header('User-Agent', ''));
            $isBot = (bool) preg_match('/googlebot|bingbot|yandex|slurp|duckduckbot|baiduspider|twitterbot|facebookexternalhit|crawler|spider|bot/i', $userAgent);

            if (!$isBot) {
                $acceptLang = strtolower($request->header('Accept-Language', ''));
                if ($acceptLang && !str_starts_with($acceptLang, 'tr')) {
                    return redirect('/en');
                }
            }
        }

        // 4. Default language for un-prefixed URLs is Turkish
        App::setLocale('tr');
        session(['locale' => 'tr']);

        return $next($request);
    }
}
