<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; // ✅ add this

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // ✅ use Auth facade instead of auth() helper
        if (!Auth::check() || Auth::user()->role !== $role) {
            abort(403, 'Unauthorized.');
        }

        return $next($request);
    }
}
