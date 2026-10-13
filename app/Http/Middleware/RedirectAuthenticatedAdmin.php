<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectAuthenticatedAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->session()->get('admin_authenticated')) {
            return redirect()->route('dashboard');
        }

        return $next($request);
    }
}
