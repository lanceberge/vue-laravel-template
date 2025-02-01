<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Subscribed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! ($request->user() &&  $request->user()->subscribed())) {
            return redirect()->route('billing')
                ->with('error', 'You need to be subscribed to access this feature.');
        }

        return $next($request);
    }
}
