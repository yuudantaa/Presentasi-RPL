<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
{
    if (!auth()->check()) {
        return redirect('/login')->withErrors('Anda harus login terlebih dahulu.');
    }

    if (!in_array(auth()->user()->role, $roles)) {
        abort(403, 'Unauthorized');
    }

    return $next($request);
}
}
