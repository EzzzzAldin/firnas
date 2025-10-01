<?php

namespace App\Http\Middleware;

use Closure;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class AdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('filament.admin.auth.login');
        }
        if (!Auth::user()->isAdmin()) {
            // Logout non-admin user
            Auth::logout();

            // Store message in session for notification
            Notification::make()
                ->title('Access Denied')
                ->body('Admin privileges required.')
                ->danger()
                ->send();

            // Redirect to login page
            return redirect()->route('filament.admin.auth.login');
        }

        return $next($request);
    }
}
