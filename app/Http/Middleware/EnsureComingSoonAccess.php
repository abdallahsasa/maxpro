<?php

namespace App\Http\Middleware;

use Closure;
use Filament\Facades\Filament;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureComingSoonAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! config('app.coming_soon', false)) {
            return $next($request);
        }

        if ($this->shouldPassThrough($request)) {
            return $next($request);
        }

        if ($this->isAdmin()) {
            return $next($request);
        }

        return response()->view('coming-soon', [
            'metaTitle' => app()->getLocale() === 'fr'
                ? 'MAX PRO SOLS — Lancement Prochainement | Revêtements de Sols & Murs'
                : (app()->getLocale() === 'ar'
                    ? 'ماكس برو — قريباً جداً | حلول الأرضيات والتكسيات الجدارية'
                    : 'MAX PRO SOLS — Coming Soon | Commercial Flooring & Walls'),
        ]);
    }

    /**
     * Determine if the request should pass through without restriction.
     */
    protected function shouldPassThrough(Request $request): bool
    {
        if ($request->is([
            'admin',
            'admin/*',
            'livewire',
            'livewire/*',
            '_boost',
            '_boost/*',
            'up',
            'filament/*',
        ])) {
            return true;
        }

        // Allow submitting direct inquiries/contact or quote requests from coming soon or external forms
        if ($request->isMethod('POST') && (
            str_ends_with($request->path(), 'contact') ||
            str_ends_with($request->path(), 'quote') ||
            $request->routeIs('contact.submit') ||
            $request->routeIs('quote.submit')
        )) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the current visitor is authenticated as an admin.
     */
    protected function isAdmin(): bool
    {
        if (auth()->guard('web')->check()) {
            return true;
        }

        if (class_exists(Filament::class) && Filament::auth()->check()) {
            return true;
        }

        return false;
    }
}
